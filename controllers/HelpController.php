<?php


namespace app\controllers;


use Yii;

use app\models\Product;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

use yii\web\Controller;

use yii\web\Response;

use yii\filters\VerbFilter;

use yii\widgets\ActiveForm;
use Elasticsearch\ClientBuilder;
use Morilog\Jalali\CalendarUtils;

class HelpController extends Controller

{


    /**
     * Displays homepage.
     *
     * @return string
     */


    public function actionIndex()

    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_help
        ]);
        \Yii::$app->view->title = $setting->title_help;

        $category = \app\models\Cathelp::find()->all();

        $models = \app\models\Help::find()->all();

        $questions = \app\models\Questionhelp::find()->all();

        $file = \app\models\File::find()->orderBy(['id' => SORT_DESC])->one();


        return $this->render('index', [

            'category' => $category,

            'models' => $models,

            'questions' => $questions,
            'file' => $file,

        ]);

    }

    public function actionDownload()
    {
        $file = \app\models\File::find()->orderBy(['id' => SORT_DESC])->one();
        $path = \Yii::getAlias('@webroot') . '/uploads/' . $file->filename;
        \yii::$app->response->sendFile($path);

        //var_dump($download->errors);exit;
    }




    public function actionIndexmetoo()
    {



        $params = [
            'index' => getIndexName(),

            'body' => [
                'settings' => [
                    'number_of_shards' => 3,
                    'number_of_replicas' => 2,
                    'analysis' => [
                        'analyzer' => [
                            'special_character_analyzer' => [
                                'type' => 'custom',
                                'filter' => ['lowercase'],
                                'tokenizer' => 'whitespace'
                            ]
                        ],
                        "normalizer" => [
                            "lowercase_normalizer" => [
                                "type" => "custom",
                                "char_filter" => [],
                                "filter" => ["lowercase", "asciifolding"]
                            ]
                        ]
                    ]
                ],
                'mappings' => [
                    '_doc' => [
                        'properties' => [
                            'product_id' => [
                                'type' => 'integer',
                            ],
                            'product_name' => [
                                'type' => 'text',
                                "norms" => ["enabled" => false],
                                'analyzer' => 'special_character_analyzer'
                            ],
                            'product_gender' => [
                                'type' => 'text',
                                'fields' => [
                                    'keyword' =>
                                        [
                                            'type' => 'keyword',
                                            'ignore_above' => 256,
                                        ],
                                ],
                                "norms" => ["enabled" => false],
                                'analyzer' => 'special_character_analyzer'
                            ],

                            'product_category' =>[
                                'type' => 'nested',
                                'properties' => [
                                    'id' => [
                                        'type' => 'integer',
                                    ],
                                    'name' => [
                                        'type' => 'text',
                                        'fields' => [
                                            'keyword' => [
                                                'type' => 'keyword',
                                                'ignore_above' => 256,
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'product_status' => [
                                'type' => 'integer'
                            ],
                            'product_plan_id' => [
                                'type' => 'integer',
                            ],
                            'product_plan_name' => [
                                'type' => 'text',
                                'fields' => [
                                    'keyword' =>
                                        [
                                            'type' => 'keyword',
                                            'ignore_above' => 256,
                                        ],
                                ],
                                "norms" => ["enabled" => false],
                                'analyzer' => 'special_character_analyzer'
                            ],
                            'product_discount_end_date' => [
                                'type' => 'date',
                            ],
                            'product_discount_start_date' => [
                                'type' => 'date',
                            ],
                            'product_color_id' => [
                                'type' => 'integer'
                            ],
                            'product_color_name' => [
                                'type' => 'text',
                                'fields' => [
                                    'keyword' =>
                                        [
                                            'type' => 'keyword',
                                            'ignore_above' => 256,
                                        ],
                                ],
                                "norms" => ["enabled" => false],
                                'analyzer' => 'special_character_analyzer'
                            ],
                            'product_storePrice' => [
                                'type' => 'integer',
                            ],
                            'product_submitDate' => [
                                'type' => 'date'
                            ],
                            'product_off' => [
                                'type' => 'integer'
                            ],
                            'product_images' => [
                                'type' => 'nested',
                                'properties' => [
                                    'id' => [
                                        'type' => 'integer',
                                    ],
                                    'url' => [
                                        'type' => 'text',
                                        'fields' => [
                                            'keyword' => [
                                                'type' => 'keyword',
                                                'ignore_above' => 256,
                                            ]
                                        ]
                                    ],
                                ]
                            ],
                            'product_details' => [
                                'type' => 'nested',
                                'properties' => [
                                    'id' => [
                                        'type' => 'integer',
                                    ],
                                    'size' => [
                                        'type' => 'text',
                                        'fields' => [
                                            'keyword' => [
                                                'type' => 'keyword',
                                                'ignore_above' => 256,
                                            ]
                                        ]
                                    ],
                                    'price' => [
                                        'type' => 'integer',
                                    ],
                                    'price_with_discount' => [
                                        'type' => 'integer',
                                    ],
                                    'discount' => [
                                        'type' => 'integer',
                                    ],
                                    'count' => [
                                        'type' => 'integer',
                                    ],
                                ]
                            ],
                            'product_more_details' => [
                                'type' => 'nested',
                                'properties' => [
                                    'detail_title' => [
                                        'type' => 'text',
                                        'fields' => [
                                            'keyword' => [
                                                'type' => 'keyword',
                                                'ignore_above' => 256,
                                            ]
                                        ],
                                        "norms" => ["enabled" => false],
                                        'analyzer' => 'special_character_analyzer'
                                    ],
                                    'detail_description' => [
                                        'type' => 'text',
                                        'fields' => [
                                            'keyword' => [
                                                'type' => 'keyword',
                                                'ignore_above' => 256,
                                            ]
                                        ],
                                        "norms" => ["enabled" => false],
                                        'analyzer' => 'special_character_analyzer'
                                    ],
                                ]
                            ],
                            'about_product' => [
                                'type' => 'text',
                                "norms" => ["enabled" => false],
                                'analyzer' => 'special_character_analyzer'
                            ]
                        ]
                    ]
                ]
            ]
        ];



//        elasticSearchClient()->indices()->create($params);


        $allProduct = Product::find()->with('catproduct', 'allproductimgs', 'plan', 'plan.offers', 'color', 'featurevalues', 'detailsvalues', 'aboutproducts', 'categoryRelationsMany.cat', 'offer', 'subcatRelations.subcat')->all();


        foreach ($allProduct as $key => $eachProduct) {


//            $result = ArrayHelper::toArray();
//


            $productDetails = [];
            foreach ($eachProduct->featurevalues as $index => $featurevalue) {
                $productDetails[$index]['size'] = $featurevalue->value;
                $productDetails[$index]['price'] = $featurevalue->price;
                $productDetails[$index]['discount'] = $eachProduct->plan->offers[0]->percent;
                $productDetails[$index]['price_with_discount'] = ($featurevalue->price * (100 - $eachProduct->plan->offers[0]->percent)) / 100;
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
                $product_category_name[$index]['id'] = $productCat->cat->name;
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
                    'product_discount_end_date' => CalendarUtils::createDatetimeFromFormat('Y/m/d', $eachProduct->plan->offers[0]->start_date)->format("Y-m-d"),
                    'product_discount_start_date' => CalendarUtils::createDatetimeFromFormat('Y/m/d', $eachProduct->plan->offers[0]->end_date)->format("Y-m-d"),
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
                ]
            ];



            $response = elasticSearchClient()->index($params);
        }


        print_r($response);

    }


    public function actionSearch()
    {
        $client = ClientBuilder::create()->setHosts(["elasticsearch:9200"])->build();
        $r = $client->search([
            'index' => getIndexName(),
            'scroll' => '10s',
            'body'  => [
                'query' => [
                    'query_string' => [
                        "query" => "شلوار",
                        "fields" => [
                            'product_name^20',
                            'product_gender^2',
                            'product_plan_name^5',
                            'product_color_name^4',
                            'product_more_details.detail_title^3',
                            'product_more_details.detail_description^3',
                            'about_product^2'
                        ]
                    ]
                ]
            ]
        ]);

        echo (json_encode($r));die();
    }



}

