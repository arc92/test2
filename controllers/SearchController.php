<?php


namespace app\controllers;


use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Elasticsearch\ClientBuilder;

class SearchController extends Controller
{

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


    public function actionSearchbyid($search)
    {


        if ((int) $search){
            $searchByKeyword = false ;
        }else{
            $searchByKeyword = true ;
        }

        if(!$searchByKeyword){
            $response = elasticSearchClient()->search([
                'index' => getIndexName(),
                'body'  => [
                    'query' => [
                        "bool"=>[
                            "must" =>[
                                "term" => [
                                    "_id" => $search
                                ]
                            ]
                        ]
                    ]
                ]
            ]);
        }else{
            $response = elasticSearchClient()->search([
                'index' => getIndexName(),
                'scroll' => '10s',
                'body'  => [
                    'query' => [
                        'query_string' => [
                            "query" => $search,
                            "fields" => $this->fields,
                            "fuzziness" => 2,
                            "minimum_should_match" => "70%"
                        ]
                    ]
                ]
            ]);
        }

        echo (json_encode($response['hits']['hits'][0]['_source']));die();
        return $this->render('searchbyid', [
            'data' =>$response['hits']['hits'][0]['_source']
        ]);



    }
}