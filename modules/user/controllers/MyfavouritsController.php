<?php



namespace app\modules\user\controllers;



use app\models\Cart;
use yii\web\Controller;

use Yii;

use \app\models\Useraddress;

/**
 * Default controller for the `user` module

 */
class MyfavouritsController extends Controller

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
            ->joinWith(['basckets' => function($q){
                $q->where(['bascket.status' => 1]);
            } ])

            ->with('cartoptions')
            ->with('cartoptions.product')
            ->all();

//        $models=\app\models\Bascket::find()->Where(['status'=>1])->all();
//
//        $cartoptions=\app\models\Cartoption::find()->all();

//        $fvoption=\app\models\Fvoption::find()->all();
//        $features=\app\models\Featurevalue::find()->all();


        return $this->render('index', [

            'carts' => $carts,
        ]);

    }

}

