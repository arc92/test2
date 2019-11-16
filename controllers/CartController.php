<?php



namespace app\controllers;



use Yii;

use yii\filters\AccessControl;

use yii\web\Controller;

use yii\web\Response;

use yii\filters\VerbFilter; 

use yii\widgets\ActiveForm;

use \app\models\Cart;

use \app\models\Cartoption;

use \app\models\Featurevalue;

use \app\models\Fvoption;

use \app\models\Product;

use \app\models\Productimg;



class CartController extends Controller

{

    /**

     * {@inheritdoc}

     */

    public function behaviors()

    {

        return [

            'access' => [

                'class' => AccessControl::className(),

                'only' => ['logout'],

                'rules' => [

                    [

                        'actions' => ['logout'],

                        'allow' => true,

                        'roles' => ['@'],

                    ],

                ],

            ],

            'verbs' => [

                'class' => VerbFilter::className(),

                'actions' => [

                    'logout' => ['post'],

                ],

            ],

        ];

    }



    /**

     * {@inheritdoc}

     */

    public function actions()

    {

        return [

            'error' => [

                'class' => 'yii\web\ErrorAction',

            ],

            'captcha' => [

                'class' => 'yii\captcha\CaptchaAction',

                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,

            ],

        ];

    }



    /**

     * Displays homepage.

     *

     * @return string

     */

  

    public function actionCart()

    {
        $setting=\app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one(); 
        \Yii::$app->view->registerMetaTag([
          'name' => 'description',
          'content' => $setting->description_cart
      ]);
      \Yii::$app->view->title=$setting->title_cart;
      
        //var_dump((\yii::$app->session['cart_id']));exit;
         if(\yii::$app->users->is_loged()){

    // $counts=\app\models\Cart::find()->Where(['userID'=>\Yii::$app->session['user_id']])->andWhere(['status'=>0])->andWhere(['submitDate'=>Yii::$app->jdate->date('Y/m/d')])->count();
    // if($counts>1){
    // foreach(\app\models\Cart::find()->Where(['userID'=>\Yii::$app->session['user_id']])->andWhere(['status'=>0])->andWhere(['submitDate'=>Yii::$app->jdate->date('Y/m/d')])->all() as $count){ 
    //   $count->delete(); 
    // }
    //   }else{
    $carts=\app\models\Cart::find()->Where(['userID'=>\Yii::$app->session['user_id']])->andWhere(['status'=>0])->andWhere(['submitDate'=>Yii::$app->jdate->date('Y/m/d')])->all(); 
     // }
       }elseif(\yii::$app->users->is_loged()==false){

        $carts=\app\models\Cart::find()->Where(['userID'=>\Yii::$app->session['guest_id']])->andWhere(['status'=>0])->andWhere(['submitDate'=>Yii::$app->jdate->date('Y/m/d')])->all();

       }

        

        $cartoptions= Cartoption::find()->all();  
        $featurevalue= Featurevalue::find()->all();  
        $fvoption= Fvoption::find()->all();  

        $products=Product::find()->all();

        //$imgs=Productimg::find()->Where(['productID'=>$products->id])->orderBy(['id'=>SORT_DESC])->one();

        $imgs=Productimg::find()->all();

        return $this->render('cart',[

             'carts'=>$carts,

            'cartoptions'=>$cartoptions,

            'products'=>$products,

            'imgs'=>$imgs,

            'featurevalue'=>$featurevalue,

            'fvoption'=>$fvoption,

           



        ]);

    }

    public function actionDelete($id)

    {

        $cart=\app\models\Cartoption::findOne($id)->delete();

        return $this->redirect(['cart']);

    }

    public function actionPlus($id)

    {

        $model =Cartoption::findOne($id); 
        if ($model  ) {
            if($x=\app\models\Fvoption::find()->Where(['cartoptionID'=>$id])->andWhere(['not',['featurevID'=>null]])->one()){
                if($num=\app\models\Featurevalue::find()->Where(['id'=>$x->featurevID])->andWhere(['not',['count'=>null]])->one() ){  
                    if($model->count < $num->count){
                         $model->count +=1; 
                         $model->save();
                         return $this->redirect(['cart']); 
                    }else{ 
                        Yii::$app->session->setFlash('error', "موجودی کافی نمی باشد!!!!");
                        return $this->redirect(['cart']); 
                    }
                }else{
                    $numproduct=\app\models\Product::find()->Where(['id'=>$model->productID])->one();
                    if($model->count < $numproduct->count){
                        $model->count +=1; 
                        $model->save();
                        return $this->redirect(['cart']); 
                   }else{ 
                       Yii::$app->session->setFlash('error', "موجودی کافی نمی باشد!!!!");
                       return $this->redirect(['cart']); 
                   }
                }
            }else{
                $product=\app\models\Product::find()->Where(['id'=>$model->productID])->one();
                if($model->count < $product->count){
                    $model->count +=1; 
                    $model->save();
                    return $this->redirect(['cart']); 
                    
               }else{
               
                   Yii::$app->session->setFlash('error', "موجودی کافی نمی باشد!!!!"); 
                   return $this->redirect(['cart']); 
               }
            }
          

        }

    }

    public function actionMinus($id)

    {

        $model =Cartoption::findOne($id);



        if ($model) {

            if($model->count > 1){

            $model->count -=1; 
            if($model->save()){

                return $this->redirect(['cart']);

            }

        }else{

            return false;

        }

    }

}

   

}

