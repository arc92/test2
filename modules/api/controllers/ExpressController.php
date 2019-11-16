<?php
namespace app\modules\api\controllers;

use yii\web\Controller;

class ExpressController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionShow($id=null){
        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        
        if($id==null)
        return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Expresssend::find()->asArray()->all()];
        if($id!=null)
        return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Expresssend::find()->where(['id'=>$id])->asArray()->all()];
    }

  

   
}