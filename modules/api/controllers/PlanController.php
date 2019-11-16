<?php
namespace app\modules\api\controllers;

use yii\web\Controller;

class PlanController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionShow($id=null){
        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        
        if($id==null)
        return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Plan::find()->asArray()->all()];
        if($id!=null)
        return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Plan::find()->where(['id'=>$id])->asArray()->all()];
    }

  

   
}