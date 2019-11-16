<?php

namespace app\modules\user\controllers;

use yii\web\Controller;
use Yii;
use \app\models\Mysize;
use \app\models\Sizeclothes;


/**
 * Default controller for the `user` module
 */
class SizeController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model=new Sizeclothes(); 
        if ($model->load(Yii::$app->request->post()) ) {

            $model->userID=\yii::$app->session['user_id'];
            $model->submitDate=Yii::$app->jdate->date('Y/m/d');
           
            if($model->save()){ 
             Yii::$app->session->setFlash('success', "اطلاعات شما با موفقیت ثبت شد");
            }else{
                Yii::$app->session->setFlash('error', "متاسفانه خطایی رخ داده است.");
            }  
        }
       
         
        
        return $this->render('index',[
            'model'=>$model,
        ]);
    }
   
}
