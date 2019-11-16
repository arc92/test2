<?php

namespace app\modules\api\controllers;



use yii\web\Controller;



class DetailsController extends Controller

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



    public function actionShow(){



        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;

        return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Details::find()->asArray()->all()];

           



    }

    /* part 1, creat API, methode post, set format input and output is JSON, $attributes is input and show output 

    array , this action have a function for convert image  for API insert data to database */

    public function actionCreate(){

        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;

        if($attributes=\yii::$app->request->post()){

            $model=new \app\models\Feature();

           foreach($attributes as $key => $value)

           $model->{$key}=$value;

           if($model->save()){

            return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Details::findOne($model->id)];

           }else{

            return['status'=>false,'code'=>500,'message'=>$model->errors,'data'=>null];

               }

        }else{

            return['status'=>false,'code'=>403,'message'=>"etalaat ersal nashode",'data'=>null];

        }

    }

    /**part 2 , update API, methode post and this action get id  */

 

    /** part 3 , delete API ,methode post and this action get id  */

    public function actionDelete(){

        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;

        if($attributes=\yii::$app->request->post()){

            $model=\app\models\Feature::findone($attributes['id']);

            if($model!=null){

            if($model->delete() ){

                return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Details::findOne($model)];

            }else{

                return['status'=>false,'code'=>403,'message'=>"invalid data",'data'=>null];

            }



        }else{

            return['status'=>false,'code'=>404,'message'=>"not found",'data'=>null];

        }

        }else{

            return['status'=>false,'code'=>403,'message'=>"invalid data",'data'=>null];

        }



    }



   

}