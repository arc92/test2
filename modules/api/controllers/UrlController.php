<?php
namespace app\modules\api\controllers;

use yii\web\Controller;

class UrlController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionShow($categoryID=null ){
        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;  
            if($categoryID!=null ){ 
            $cat=\app\models\Catproduct::find()->Where(['id'=>$categoryID])->all();
            }

        return['status'=>true,'code'=>200,'message'=>null,'data'=>$cat];
    }



}

