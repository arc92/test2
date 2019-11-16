<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Slider;
use app\models\SliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Uploads;
use yii\web\UploadedFile;
/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SlidercornController extends Controller
{

    public function actionRequest()
    {
       
       $time=time();
       $now=Yii::$app->jdate->date('H',$time); 

        foreach(\app\models\Slider::find()->Where(['create_date'=>Yii::$app->jdate->date('Y/m/d')])->andWhere(['hour'=>$now])->andWhere(['status'=>0])->all() as $slider){
            $slider->status=1; 
            $slider->save();  
        }

}

}