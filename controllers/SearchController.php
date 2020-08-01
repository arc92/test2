<?php


namespace app\controllers;


use app\models\Product;
use Morilog\Jalali\CalendarUtils;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Elasticsearch\ClientBuilder;

class SearchController extends Controller
{
    private $schema = [
        'index' => "product",
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
                        'cat_products' =>[
                            'type' => 'nested',
                            'properties' => [
                                'name' => [
                                    'type' => 'text',
                                    'fields' => [
                                        'keyword' => [
                                            'type' => 'keyword',
                                            'ignore_above' => 256,
                                        ]
                                    ]
                                ],
                                'urltitle' => [
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

    private $fields = [
        'product_name^20',
        'product_gender^2',
        'product_plan_name^5',
        'product_color_name^4',
        'product_more_details.detail_title^3',
        'product_more_details.detail_description^3',
        'about_product^2'
    ];

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }



    public function actionCreateshema(){
        elasticSearchClient()->indices()->create($this->schema);
    }


    public function actionSearchincategory()
    {
        $request = \Yii::$app->request;
        $searchKeyword = $request->get('search_keyword','');
        $categoryName = $request->get('category_name','');

        $client = elasticSearchClient();
        $result = $client->search([
            'index' => 'product',
            'scroll' => '10s',
            'body'  => [
                'query' => [
                    'bool' => [
                        'must' => [
                            [
                                'nested' => [
                                    'path' => "cat_products",
                                    'query' => [
                                        'match' => [
                                            'cat_products.name' => $categoryName
                                        ]
                                    ]
                                ]
                            ],
                            [
                                'query_string' => [
                                    'query' => $searchKeyword
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]);


        if (!empty($result['hits'])){
            $result = $result['hits']['hits'];
        }

//echo json_encode($result[0]['_source']['product_details']);die();
        return $this->render('search', [
            'search' => $result,
            'selectedIn' => $categoryName,
            'searchedKeyword' => $searchKeyword
        ]);


    }


}