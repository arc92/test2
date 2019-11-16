<?php

namespace app\modules\api\controllers;



use yii\web\Controller;



class CategoryController extends Controller

{
    /**
 * @inheritdoc
 */
public function behaviors()
{
    return [
        'corsFilter' => [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                // restrict access to
                'Origin' => ['http://www.rezamansouri.id.ir', 'https://www.rezamansouri.id.ir'],
                // Allow only POST and PUT methods
                'Access-Control-Request-Method' => ['POST', 'PUT'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Request-Headers' => ['X-Wsse'],
                // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],

        ],
    ];
}

    public $enableCsrfValidation = false;



    public function actionShow($id=null){

        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;

        if($id==null)

        return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Category::find()->asArray()->all()];

        if($id!=null)

        return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Category::findOne($id)];

        

    }

    /* part 1, creat API, methode post, set format input and output is JSON, $attributes is input and show output 

    array , this action have a function for convert image  for API insert data to database */

 

   

}