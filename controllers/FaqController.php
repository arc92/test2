<?php



namespace app\controllers;



use Yii;

use yii\filters\AccessControl;

use yii\web\Controller;

use yii\web\Response;

use yii\filters\VerbFilter;

use yii\data\ActiveDataProvider;

use yii\data\Pagination;

use yii\base\BaseObject;

use yii\base\Configurable;

use yii\web\Link;

use yii\web\Linkable;

use yii\web\Request;







class FaqController extends Controller

{





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

  

    public function actionIndex()

    {
        $setting=cacheSetting();
        \Yii::$app->view->registerMetaTag([
          'name' => 'description',
          'content' => $setting->description_faq
      ]);
      \Yii::$app->view->title=$setting->title_faq;

        $faqs=\app\models\Faq::find()->orderBy(['id' => SORT_DESC])->all();

      

        return $this->render('index',[

            'faqs'=>$faqs,

        ]);

    }

  



    

    

}

