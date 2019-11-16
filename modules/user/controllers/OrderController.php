<?php

namespace app\modules\user\controllers;

use yii\web\Controller;
use Yii;
use yii\data\Pagination;
use yii\web\Link;
use yii\web\Linkable;



/**
 * Default controller for the `user` module
 */
class OrderController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $carts=\app\models\Cart::find()->Where(['userID'=>\yii::$app->session['user_id']])->andWhere(['status'=>1])->orderBy(['id'=>SORT_DESC])->all(); 
        $basckets=\app\models\Bascket::find()->Where(['status'=>1])->orWhere(['status'=>2])->all(); 
        $bascket=\app\models\Bascket::find()->Where(['status'=>1]); 
        $cartoptions=\app\models\Cartoption::find()->all();
        $fvoption=\app\models\Fvoption::find()->all();
        $features=\app\models\Featurevalue::find()->all();
        $products=\app\models\Product::find()->all();
        $countQuery = clone $bascket;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>16]);
        $models = $bascket->offset($pagination->offset)
        ->limit($pagination->limit)
         ->all(); 
        
        return $this->render('index',[
            'models'=>$models,
            'cartoptions'=>$cartoptions,
            'carts'=>$carts,
            'pagination'=>$pagination,
            'products'=>$products,
            'basckets'=>$basckets,
            'fvoption'=>$fvoption,
            'features'=>$features,
        ]);
    }
    
        
       
}
