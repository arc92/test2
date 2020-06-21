<?php


namespace app\modules\api\controllers;


use Elasticsearch\ClientBuilder;
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

}