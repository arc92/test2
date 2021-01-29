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


class PlanController extends Controller
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
        $setting = cacheSetting();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_collection
        ]);
        \Yii::$app->view->title = $setting->title_collection;

        $plans = \app\models\Plan::find()->orderBy(['id' => SORT_DESC])->all();


        return $this->render('index', compact('plans'));

    }

    //show product where planID ==$id

    public function actionPlanproduct($name)

    {

        // if(count(explode('%20',$_SERVER['REQUEST_URI'])) > 1){

        //     header("Location: ".str_replace("%20","_",$_SERVER['REQUEST_URI']));

        //  }

        $category = new \app\models\Category();

        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();

        $imgs = \app\models\Productimg::find()->all();

        $model = new \app\models\Product();
        $strname = str_replace('-', ' ', $name);
        $plan = \app\models\Plan::find()->where(['like', 'name', $strname])->one();

        $products = \app\models\Product::find()->where(['planID' => $plan->id])->orderBy(['id' => SORT_DESC]);

        $countQuery = clone $products;

        $count = $countQuery->count();

        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);

        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $aboutproducts = \app\models\Aboutproduct::find()->all();

        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $plan->description
        ]);
        \Yii::$app->view->title = $plan->title;

        return $this->render('planproduct',
            compact('aboutproducts', 'imgs', 'articles', 'pagination', 'category', 'model', 'size', 'count', 'subcat'));

    }

    public function actionCollections($name)
    {
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();


        $model = new \app\models\Product();
        $strname = str_replace('-', ' ', $name);
        $plan = \app\models\Plan::find()->where(['like', 'name', $strname])->one();

        $products = \app\models\Product::find();
        $products->joinWith(['featurevalues'])
            ->with('productimgs')
            ->with('catproducts');
        $products->select(['product.id', 'product.name', 'product.status', 'product.catID', 'product.subcatID', 'product.planID', 'product.colorID', 'product.storePrice', 'product.price', 'product.count', 'product.description', 'product.likes', 'product.submitDate', 'product.titlemeta', 'product.descriptionmeta', 'product.off', 'SUM(featurevalue.count) AS product_Count']);
        $products->groupBy(['product.id', 'product.name', 'product.status', 'product.catID', 'product.subcatID', 'product.planID', 'product.colorID', 'product.storePrice', 'product.price', 'product.count', 'product.description', 'product.likes', 'product.submitDate', 'product.titlemeta', 'product.descriptionmeta', 'product.off']);
        $products->where(['product.planID' => $plan->id]);
        $products->orderBy(['product_Count' => SORT_DESC]);

        $countQuery = clone $products;

        $count = $countQuery->count();


        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 9]);
        $products->offset($pagination->offset);
        $products->limit($pagination->limit);
        $articles = $products->all();

        $aboutproducts = \app\models\Aboutproduct::find()->all();

        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $plan->description
        ]);
        \Yii::$app->view->title = $plan->title;

        return $this->render('collections',
            compact('aboutproducts', 'imgs', 'articles', 'pagination', 'category', 'model', 'size', 'count', 'subcat'));

    }


    public function actionLike($like)
    {
        $model = Product::findOne($like);

        if ($model && \yii::$app->session['like'] != $like) {
            $model->likes += 1;
            if ($model->save()) {
                return true;
            }
        }
    }


}

