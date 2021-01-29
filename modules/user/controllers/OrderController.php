<?php

namespace app\modules\user\controllers;

use app\models\Cart;
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
        $carts = Cart::find()
            ->Where(['userID' => \yii::$app->session['user_id']])
            ->andWhere(['cart.status' => 1])
            ->orderBy(['id' => SORT_DESC])
            ->joinWith([
                'basckets' => function ($q) {
                    $q->where(['bascket.status' => 1]);
                    $q->orWhere(['bascket.status' => 2]);
                }
            ])
            ->with('cartoptions')
            ->with('cartoptions.fvoption.featurev')
            ->with('cartoptions.product')
            ->with('cartoptions.product.productimgs')
            ->all();

        $bascket = \app\models\Bascket::find()->Where(['status' => 1]);
        $countQuery = clone $bascket;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 16]);
        $models = $bascket->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'carts' => $carts,
            'pagination' => $pagination
        ]);
    }


}
