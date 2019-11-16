<?php

namespace app\modules\api\controllers;



use yii\web\Controller;



class OfferController extends Controller

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



    public function actionCheck($code=null){

        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        if(\app\models\Offer::find()->where(['planID'=>$code])->asArray()->one()){
            
            return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->asArray()->all()]; 
        }

        // if(\app\models\ProductOffer::find()->where(['offer'=>$code])->asArray()->one()){

        //     return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\ProductOffer::find()->asArray()->all()]; 
        // }
       
        return['status'=>false,'code'=>200,'message'=>null,'data'=>null]; 


    }

}

