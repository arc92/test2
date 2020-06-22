<?php


namespace app\modules\api\controllers;


use app\models\Product;
use Elasticsearch\ClientBuilder;
use Morilog\Jalali\CalendarUtils;
use yii\web\Controller;

class SearchController extends Controller
{
    public $enableCsrfValidation = false;
    private $fields = [
        'product_name^20',
        'product_gender^2',
        'product_plan_name^5',
        'product_color_name^4',
        'product_more_details.detail_title^3',
        'product_more_details.detail_description^3',
        'about_product^2'
    ];

    public static function allowedDomains() {
        return [
            // '*',                        // star allows all domains
            'http://localhost:8009',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST','GET'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }

    public function actionIndex()
    {
        $request = \Yii::$app->request;
        $search = $request->get('search');
        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;

        if((int)$search){
            $body = [
                'query' => [
                    'bool' => ['must' => ['term' => ['_id' => $search]]]
                ]
            ];
        }else{
            $body = [
                'query' => [
                    'query_string' => [
                        "query" => $search,
                        "fields" => $this->fields
                    ]
                ],
                'aggs' =>[
                    'catproducts' => [
                        'nested' => [
                            'path' => 'cat_products'
                        ],
                        'aggs' => [
                            'categories' => [
                                'terms' => [
                                    'size' => 3,
                                    'order' => [
                                        '_count' => 'desc'
                                    ],
                                    'field' => 'cat_products.name.keyword'
                                ],
                                'aggs' => [
                                    'categories_url' => [
                                        'terms' => [
                                            'field' => 'cat_products.urltitle.keyword',
                                            'size' => 3
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ];
        }

        $client = elasticSearchClient();
        $result = $client->search([
            'index' => 'product',
            'scroll' => '10s',
            'size' => '6',
            'body'  => $body
        ]);


        if (!empty($result['hits'])){
            $products = $result['hits']['hits'];
        }

        $category = [];
        if (!empty($result['aggregations']['catproducts']['categories']['buckets'])){
            foreach ($result['aggregations']['catproducts']['categories']['buckets'] as $key => $eachCategory){

                $category[$key]['category_name'] = $eachCategory['key'];
                $category[$key]['url']  = $eachCategory['categories_url']['buckets'][0]['key'];
            }
        }

        $response = [
            'products' => $products,
            'categories' => $category,
        ];

        return['status'=>true,'code'=>200,'message'=>null, 'searchedKeyword' => $search,'data'=>$response];
    }

    /*
     * for importing data from mysql to elastic search*/
    public function actionIndexdata()
    {
        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        $allProduct = Product::find()->with('catproducts', 'allproductimgs', 'plan', 'plan.offers', 'color', 'featurevalues', 'detailsvalues', 'aboutproducts', 'categoryRelationsMany.cat', 'offer', 'subcatRelations.subcat')->all();


        foreach ($allProduct as $key => $eachProduct) {

            $catproducts = [];
            foreach ($eachProduct->catproducts as  $index => $catproduct){
                $catproducts[$index]['name'] = $catproduct->name;
                $catproducts[$index]['urltitle'] = $catproduct->urltitle;
            }

            $productDetails = [];
            foreach ($eachProduct->featurevalues as $index => $featurevalue) {
                $offPercent = empty($eachProduct->plan->offers[0]) ? null : $eachProduct->plan->offers[0]->percent;
                $productDetails[$index]['size'] = $featurevalue->value;
                $productDetails[$index]['price'] = $featurevalue->price;
                $productDetails[$index]['discount'] = $offPercent;
                if($offPercent){
                    $productDetails[$index]['price_with_discount'] = ($featurevalue->price * (100 - $eachProduct->plan->offers[0]->percent)) / 100;
                }else{
                    $productDetails[$index]['price_with_discount'] = $featurevalue->price ;
                }
                $productDetails[$index]['count'] = $featurevalue->count;
            }

            $product_more_details = [];
            foreach ($eachProduct->detailsvalues as $index => $detailsvalue) {
                $product_more_details[$index]['detail_title'] = $detailsvalue->title;
                $product_more_details[$index]['detail_description'] = $detailsvalue->value;
            }

            $aboutProducts = [];
            foreach ($eachProduct->aboutproducts as $index => $aboutProduct) {
                array_push($aboutProducts, $aboutProduct->details);
            }

            $imgs = [];
            if ($eachProduct->allproductimgs) {
                foreach ($eachProduct->allproductimgs as $index => $image) {
                    $imgs[$index]['id'] = $image->id;
                    $imgs[$index]['url'] = $image->img;
                }
            }


            $product_category_name = [];
            foreach ($eachProduct->categoryRelationsMany as $index => $productCat){
                $product_category_name[$index]['id'] = $productCat->cat->id;
                $product_category_name[$index]['name'] = $productCat->cat->name;
            }



            $params = [
                'index' => 'product',
                'id' => $eachProduct->id,
                'body' => [
                    'product_id' => $eachProduct->id,
                    'product_name' => $eachProduct->name,
                    'product_gender' => $eachProduct->subcatRelations->subcat->name,
                    'product_category' => $product_category_name,
                    'product_status' => $eachProduct->status,
                    'product_plan_id' => $eachProduct->planID,
                    'product_plan_name' => $eachProduct->plan->name,
                    'product_discount_end_date' => CalendarUtils::createDatetimeFromFormat('Y/m/d', empty($eachProduct->plan->offers[0]) ? null: $eachProduct->plan->offers[0]->start_date)->format("Y-m-d"),
                    'product_discount_start_date' => CalendarUtils::createDatetimeFromFormat('Y/m/d', empty($eachProduct->plan->offers[0])? null : $eachProduct->plan->offers[0]->end_date)->format("Y-m-d"),
                    'product_color_id' => $eachProduct->colorID,
                    'product_color_name' => $eachProduct->color->value,
                    'product_storePrice' => $eachProduct->price,
                    'product_storePrice_discount' => ($eachProduct->price * (100 - $eachProduct->plan->offers[0]->percent)) / 100,
                    'product_submitDate' => CalendarUtils::createDatetimeFromFormat('Y/m/d', $eachProduct->submitDate)->format("Y-m-d"),
                    'product_off' => $eachProduct->off,
                    'product_images' => $imgs,
                    'product_details' => $productDetails,
                    'product_more_details' => $product_more_details,
                    'about_product' => $aboutProducts,
                    'cat_products' => $catproducts,
                ]
            ];



            $response = elasticSearchClient()->index($params);
        }

        if($response)
            return['status'=>true,'code'=>200,'message'=>null];
    }

}