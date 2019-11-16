<?php
namespace app\modules\api\controllers;

use yii\web\Controller;

class FeaturevController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionShow($id){
        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        if($id!=null)
        return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Featurevalue::find()->Where(['id'=>$id])->asArray()->all()];
      
    }
}
