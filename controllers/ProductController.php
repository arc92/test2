<?php

namespace app\controllers;

use app\models\Catproduct;
use app\models\Contentcategory;
use app\models\Featurevalue;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
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
use \app\models\Product;
use yii\db\Expression;
use yii\behaviors\SluggableBehavior;


class ProductController extends Controller
{

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'alias',
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
     * لینک منو محصولات
     *
     * @return string
     */

    public function actionIndex()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_product_index
        ]);
        \Yii::$app->view->title = $setting->title_product_index;

        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->one();
        $model = new Product();
        // $products=\app\models\Product::find()->Where(['status'=>1])->orderBy(new Expression('rand()'));
        $products = Product::find()->Where(['status' => 1])->orderBy(['off' => SORT_DESC]);
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index',
            compact('imgs',
                'articles',
                'pagination',
                'category',
                'model',
                'size',
                'count',
                'aboutproducts',
                'subcat'));
    }

    public function actionTest()
    {
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->one();
        $model = new Product();
        $products = Product::find()->Where(['status' => 1])->orderBy(new Expression('rand()'));
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('test', compact('imgs', 'articles', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts', 'subcat'));
    }

    public function actionIndex2()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_product_index2
        ]);
        \Yii::$app->view->title = $setting->title_product_index2;

        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->one();
        $model = new Product();
        $products = Product::find()->Where(['status' => 2]);
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index2', compact('imgs', 'articles', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts', 'subcat'));
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

    /**
     * نوزاد دختر
     *
     * @return string
     */

    public function actionGirlgrid()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_girlgrid
        ]);
        \Yii::$app->view->title = $setting->title_girlgrid;

        $products = Product::find()
            ->joinWith(['featurevalues'])
            ->with([
                'productimgs',
                'aboutproducts',
                'categoryRelations' => function ($query) {
                    $query->where(['catID' => 1]);
                }
            ])
            ->where(['subcat_relation.subcatID' => 9]);

        $products->select(['product.id', 'product.name', 'product.status', 'product.catID', 'product.subcatID', 'product.planID', 'product.colorID', 'product.storePrice', 'product.price', 'product.count', 'product.description', 'product.likes', 'product.submitDate', 'product.titlemeta', 'product.descriptionmeta', 'product.off', 'SUM(featurevalue.count) AS product_Count']);
        $products->groupBy(['product.id', 'product.name', 'product.status', 'product.catID', 'product.subcatID', 'product.planID', 'product.colorID', 'product.storePrice', 'product.price', 'product.count', 'product.description', 'product.likes', 'product.submitDate', 'product.titlemeta', 'product.descriptionmeta', 'product.off']);
        $products->orderBy(['product_Count' => SORT_DESC]);

        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 12]);
        $products->offset($pagination->offset);
        $products->limit($pagination->limit);
        $articles = $products->all();

        \Yii::$app->view->title = 'baby girl';
        return $this->render('girlgrid',
            compact('contentcategory', 'articles', 'pagination', 'category', 'size', 'count'));

    }

    /**
     * نوزاد پسر
     *
     * @return string
     */
    public function actionBoygrid()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_girlgrid
        ]);
        \Yii::$app->view->title = $setting->title_girlgrid;

        $products = Product::find()
            ->joinWith(['featurevalues'])
            ->joinWith(['subcatRelations'])
            ->with([
                'productimgs',
                'aboutproducts',
                'categoryRelations' => function ($query) {
                    $query->where(['catID' => 1]);
                }
            ])
            ->where(['subcat_relation.subcatID' => 10]);
        $products->select(['product.id', 'product.name', 'product.status', 'product.catID', 'product.subcatID', 'product.planID', 'product.colorID', 'product.storePrice', 'product.price', 'product.count', 'product.description', 'product.likes', 'product.submitDate', 'product.titlemeta', 'product.descriptionmeta', 'product.off', 'SUM(featurevalue.count) AS product_Count']);
        $products->groupBy(['product.id', 'product.name', 'product.status', 'product.catID', 'product.subcatID', 'product.planID', 'product.colorID', 'product.storePrice', 'product.price', 'product.count', 'product.description', 'product.likes', 'product.submitDate', 'product.titlemeta', 'product.descriptionmeta', 'product.off']);
        $products->orderBy(['product_Count' => SORT_DESC]);

        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 12]);
        $products->offset($pagination->offset);
        $products->limit($pagination->limit);
        $articles = $products->all();

        \Yii::$app->view->title = 'baby boy';
        return $this->render('girlgrid',
            compact('contentcategory', 'articles', 'pagination', 'category', 'size', 'count'));

    }

    /**
     * کودک نو پا دختر
     *
     * @return string
     */

    public function actionGirlbaby()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_girlbaby
        ]);
        \Yii::$app->view->title = $setting->title_girlbaby;

        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $model = new Product();
        $catrelations = \app\models\CategoryRelation::find()->Where(['catID' => 2])->all();
        $subcatrelations = \app\models\SubcatRelation::find()->Where(['subcatID' => 9])->all();
        $products = Product::find()->Where(['status' => 1]);
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 30]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $imgs = \app\models\Productimg::find()->all();
        return $this->render('girlbaby', compact('catrelations', 'subcatrelations', 'imgs', 'subcat', 'articles', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts'));
    }

    /**
     * کودک نو پا پسز
     *
     * @return string
     */
    public function actionBoybaby()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_boybaby
        ]);
        \Yii::$app->view->title = $setting->title_boybaby;

        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $model = new Product();
        $catrelations = \app\models\CategoryRelation::find()->Where(['catID' => 2])->all();

        $subcatrelations = \app\models\SubcatRelation::find()->Where(['subcatID' => 10])->all();
        $products = Product::find()->Where(['status' => 1]);
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 100]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $imgs = \app\models\Productimg::find()->all();
        return $this->render('boybaby', compact('catrelations', 'subcatrelations', 'imgs', 'subcat', 'articles', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts'));
    }

    public function actionMenulink($name)
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_menulink
        ]);
        \Yii::$app->view->title = $setting->title_menulink;

        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $strname = str_replace('-', ' ', $name);
        $products = Product::find()->Where(['status' => 1])->andWhere(['LIKE', 'name', $strname])->orderBy(['id' => SORT_DESC]);
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->all();
        $model = new Product();
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('menulink', compact('imgs', 'articles', 'subcat', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts'));
    }

    public function actionTowel($name)
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_menulink
        ]);
        \Yii::$app->view->title = $setting->title_menulink;

        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $strname = str_replace('-', ' ', $name);
        $products = Product::find()->Where(['status' => 1])->andWhere(['LIKE', 'name', $strname])->orderBy(['id' => SORT_DESC]);
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->all();
        $model = new Product();
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('towel', compact('imgs', 'articles', 'subcat', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts'));
    }

    public function actionSet()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_menulink
        ]);
        \Yii::$app->view->title = $setting->title_menulink;

        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $strname = str_replace('-', ' ', 'ست-نوزادی');
        $products = Product::find()->Where(['status' => 1])->andWhere(['LIKE', 'name', $strname])->orderBy(['id' => SORT_DESC]);
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->all();
        $model = new Product();
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('set', compact('imgs', 'articles', 'subcat', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts'));
    }

    public function actionSets()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_menulink
        ]);
        \Yii::$app->view->title = $setting->title_menulink;

        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $strname = str_replace('-', ' ', 'ست-نوزادی');
        $products = Product::find()->Where(['status' => 1])->andWhere(['LIKE', 'name', $strname])->orderBy(['id' => SORT_DESC]);
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->all();
        $model = new Product();
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('sets', compact('imgs', 'articles', 'subcat', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts'));
    }

    public function actionBestsales()
    {


        $connection = Yii::$app->getDb();

        $products = $connection->createCommand("
         select count(p.id) as sales_rate ,p.`name`, p.price,pi.img,o.percent,o.start_date,o.end_date
         from bascket as b
         join cartoption as c on c.id = b.id
         join product as p on p.id = c.productID
         join productimg as pi on pi.productID = p.id
         join offer as o on o.planID = p.planID
          GROUP BY p.id,pi.id,o.id
          ORDER BY sales_rate DESC
           limit 52")
            ->queryAll();





        \Yii::$app->view->title = "پر فروش ترین ها";
        return $this->render('bestsales', compact( 'products'));
    }

    public function actionBabycat($id = null, $urltitle)
    {
        if ($id != null) {
            $catproducts = Catproduct::find()->Where(['id' => $id])->one();
        } else {
            $catproducts = Catproduct::find()->Where(['urltitle' => $urltitle])->one();
        }
        $contentcategory = Contentcategory::find()->Where(['catID' => $catproducts->id])->orderBy(['id' => SORT_DESC])->one();


        $products = Product::find()->joinWith(['featurevalues','catproducts' =>function($query) use($catproducts){
            $query->where(['catproduct.id' => $catproducts->id]);
        }]);

        $products->select(['product.id', 'product.name', 'product.status', 'product.catID', 'product.subcatID', 'product.planID', 'product.colorID', 'product.storePrice', 'product.price', 'product.count', 'product.description', 'product.likes', 'product.submitDate', 'product.titlemeta', 'product.descriptionmeta', 'product.off', 'SUM(featurevalue.count) AS product_Count']);
        $products->groupBy(['product.id', 'product.name', 'product.status', 'product.catID', 'product.subcatID', 'product.planID', 'product.colorID', 'product.storePrice', 'product.price', 'product.count', 'product.description', 'product.likes', 'product.submitDate', 'product.titlemeta', 'product.descriptionmeta', 'product.off']);
        $products->orderBy(['product_Count' => SORT_DESC]);

        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 12]);
        $products->offset($pagination->offset);
        $products->limit($pagination->limit);
        $articles = $products->all();

        $catproduct = Catproduct::find()->Where(['urltitle' => $urltitle])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $catproduct->description
        ]);
        \Yii::$app->view->title = $catproduct->title;
        return $this->render('babycat', compact( 'contentcategory','articles',  'pagination', 'category', 'size', 'count'));
    }

    ////product details

    public function actionProduct($id = null, $name)
    {
        date_default_timezone_set("Asia/tehran");
        $strname = str_replace('-', ' ', $name);
        if ($id != null) {
            $product = Product::find()->where(['id' => $id])->one();
        } else {
            $product = Product::find()->where(['name' => $strname])->one();
        }
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $product->descriptionmeta
        ]);
        if ($product->titlemeta != null) {
            \Yii::$app->view->title = $product->titlemeta;
        } else {
            \Yii::$app->view->title = $product->name;
        }

        ///***********************/////
        $imgs = \app\models\Productimg::find()->where(['productID' => $product->id])->all();
        $catrelations = \app\models\CategoryRelation::find()->where(['productID' => $product->id])->all();
        $subcatrelations = \app\models\SubcatRelation::find()->where(['productID' => $product->id])->all();
        $aboutproducts = \app\models\Aboutproduct::find()->where(['productID' => $product->id])->all();
        $color = \app\models\Color::find()->all();
        $feature = \app\models\Feature::find()->all();
        $featurevalue = \app\models\Featurevalue::find()->where(['productID' => $product->id])->all();
        $details = \app\models\Details::find()->all();
        $detailsvalue = \app\models\Detailsvalue::find()->where(['productID' => $product->id])->all();
        $count = \app\models\Cartoption::find()->Where(['productID' => $product->id])->sum('count');
        $sizes = \app\models\Size::find()->all();
        $cart = new \app\models\Cart();
        $cartoption = new \app\models\Cartoption();
        $fvoption = new \app\models\Fvoption();
        $comments = \app\models\Checkit::find()->Where(['productID' => $product->id])->all();
        $checkit = new \app\models\Checkit();
        $letme = new \app\models\Letme();
        $count = \app\models\Checkit::find()->Where(['productID' => $product->id])->count();
        $sum = \app\models\Checkit::find()->Where(['productID' => $product->id])->sum('rate');


        if ($checkit->load(Yii::$app->request->post())) {
            $checkit->productID = $product->id;
            $checkit->status = 0;
            $checkit->submitDate = Yii::$app->jdate->date('Y/m/d');
            $checkit->save();
            Yii::$app->session->setFlash('confirm', "اطلاعات شما با موفقیت ثبت شد");
            return $this->refresh();
        }
        if ($letme->load(Yii::$app->request->post())) {
            $letme->productID = $product->id;
            $letme->status = 0;
            $letme->submitDate = Yii::$app->jdate->date('Y/m/d');
            $letme->save();
        }

        if ($cartoption->load(Yii::$app->request->post())) {
            //set session for cart id
            $usercheck = \app\models\Cart::find()->Where(['userID' => \yii::$app->session['user_id']])->andWhere(['status' => 0])->andwhere(['submitDate' => \Yii::$app->jdate->date('Y/m/d')])->count();
            if ((!isset(\yii::$app->session['cart_id'])) && \yii::$app->users->is_loged() == true && $usercheck == 1) {
                $cart = \app\models\Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 0])->andWhere(['submitDate' => Yii::$app->jdate->date('Y/m/d')])->one();
                $cart->userID = \yii::$app->session['user_id'];
                $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                $cart->status = 0;
                $cart->save();
                \yii::$app->session['cart_id'] = $cart->id;
            } elseif ((!isset(\yii::$app->session['cart_id'])) && \yii::$app->users->is_loged() == true && $usercheck == 0) {
                $cart->userID = \yii::$app->session['user_id'];
                $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                $cart->status = 0;
                $cart->save();
                \yii::$app->session['cart_id'] = $cart->id;
            } elseif ((!isset(\yii::$app->session['cart_id'])) && \yii::$app->users->is_loged() == false) {
                $time = time();
                \yii::$app->session['guest_id'] = $time;
                $cart->userID = \yii::$app->session['guest_id'];
                $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                $cart->status = 0;
                $cart->save();
                \yii::$app->session['cart_id'] = $cart->id;
            } elseif ((isset(\yii::$app->session['cart_id'])) && \yii::$app->users->is_loged() == false) {
                $cart = \app\models\Cart::find()->Where(['id' => \yii::$app->session['cart_id']])->one();
                $time = time();
                \yii::$app->session['guest_id'] = $time;
                $cart->userID = \yii::$app->session['guest_id'];
                $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                $cart->status = 0;
                $cart->save();
                \yii::$app->session['cart_id'] = $cart->id;
            } elseif (isset(\yii::$app->session['cart_id']) && (\app\models\Cart::find()->Where(['id' => \yii::$app->session['cart_id']])->andWhere(['userID' => \yii::$app->session['user_id']])->andWhere(['status' => 0])->andwhere(['submitDate' => \Yii::$app->jdate->date('Y/m/d')])->one()) && \yii::$app->users->is_loged() == true) {
                $cart = \app\models\Cart::find()->Where(['id' => \yii::$app->session['cart_id']])->one();
                $cart->userID = \yii::$app->session['user_id'];
                $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                $cart->status = 0;
                $cart->save();
            } elseif (isset(\yii::$app->session['cart_id']) && (\app\models\Cart::find()->Where(['id' => \yii::$app->session['cart_id']])->andWhere(['userID' => \yii::$app->session['user_id']])->andWhere(['status' => 1])->andwhere(['submitDate' => \Yii::$app->jdate->date('Y/m/d')])->one()) && \yii::$app->users->is_loged() == true) {
                if ($carts = \app\models\Cart::find()->Where(['id' => \yii::$app->session['cart_id']])->one()) {
                    unset(\Yii::$app->session['cart_id']);
                    unset(\Yii::$app->session['guest_id']);
                }
                $carts = \app\models\Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 0])->andWhere(['submitDate' => Yii::$app->jdate->date('Y/m/d')])->one();
                if ($carts) {
                    $carts->userID = \yii::$app->session['user_id'];
                    $carts->submitDate = Yii::$app->jdate->date('Y/m/d');
                    $carts->status = 0;
                    $carts->save();
                    \yii::$app->session['cart_id'] = $carts->id;
                } else {
                    $cart->userID = \yii::$app->session['user_id'];
                    $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                    $cart->status = 0;
                    $cart->save();
                    \yii::$app->session['cart_id'] = $cart->id;
                }
            }
            if (\app\models\Cartoption::find()->Where(['cartID' => \yii::$app->session['cart_id']])->andWhere(['productID' => $product->id])->one()) {
                $coption = \app\models\Cartoption::find()->Where(['cartID' => \yii::$app->session['cart_id']])->andWhere(['productID' => $product->id])->one();
                $fvoption = \app\models\Fvoption::find()->Where(['cartoptionID' => $coption->id])->one();
                if ($fvoption->featurevID == Yii::$app->request->post('cartprice')) {
                    $coption->count += Yii::$app->request->post('countproduct');
                    if ($coption->save()) {
                        Yii::$app->session->setFlash('success', "محصول با موفقیت به سبد خرید افزوده شد.");
                    } else {
                        Yii::$app->session->setFlash('error', "متاسفانه خطایی رخ داده است.");
                    }
                } else {
                    $cartoption->cartID = \yii::$app->session['cart_id'];
                    $cartoption->productID = $product->id;
                    $cartoption->count = Yii::$app->request->post('countproduct');
                    if ($featurevalue) {
                        $fvid = \app\models\Featurevalue::find()->Where(['id' => Yii::$app->request->post('cartprice')])->one();
                        $cartoption->amount = Yii::$app->request->post('advance');
                        $cartoption->off = Yii::$app->request->post('firstprice');
                    } else {
                        $cartoption->amount = Yii::$app->request->post('advanceprice');
                        $cartoption->off = Yii::$app->request->post('offprice1');
                    }
                    //save cartoption tabel

                    if ($cartoption->save()) {
                        if ($featurevalue) {
                            $newoption = new \app\models\Fvoption();
                            $newoption->cartoptionID = $cartoption->id;
                            $newoption->featurevID = Yii::$app->request->post('cartprice');
                            $newoption->submitDate = Yii::$app->jdate->date('Y/m/d');
                            $newoption->save();
                        } else {
                            $newoption = new \app\models\Fvoption();
                            $newoption->cartoptionID = $cartoption->id;
                            $newoption->submitDate = Yii::$app->jdate->date('Y/m/d');
                            $newoption->save();
                        }
                        Yii::$app->session->setFlash('success', "محصول با موفقیت به سبد خرید افزوده شد.");
                    } else {
                        Yii::$app->session->setFlash('error', "متاسفانه خطایی رخ داده است.");
                    }
                }

            } else {

                $cartoption->cartID = \yii::$app->session['cart_id'];
                $cartoption->productID = $product->id;
                $cartoption->count = Yii::$app->request->post('countproduct');
                if ($featurevalue) {
                    $fvid = \app\models\Featurevalue::find()->Where(['id' => Yii::$app->request->post('cartprice')])->one();
                    $cartoption->amount = Yii::$app->request->post('advance');
                    $cartoption->off = Yii::$app->request->post('firstprice');
                } else {
                    $cartoption->amount = Yii::$app->request->post('advanceprice');
                    $cartoption->off = Yii::$app->request->post('offprice1');
                }
                //save cartoption tabel
                if ($cartoption->save()) {
                    if ($featurevalue) {
                        //     var_dump(Yii::$app->request->post('cartprice'));exit;
                        // foreach(Yii::$app->request->post('cartprice') as $key=>$value){

                        $newoption = new \app\models\Fvoption();
                        $newoption->cartoptionID = $cartoption->id;
                        $newoption->featurevID = Yii::$app->request->post('cartprice');
                        $newoption->submitDate = Yii::$app->jdate->date('Y/m/d');
                        $newoption->save();
                    } else {
                        $newoption = new \app\models\Fvoption();
                        $newoption->cartoptionID = $cartoption->id;
                        $newoption->submitDate = Yii::$app->jdate->date('Y/m/d');
                        $newoption->save();
                    }
                    //if($fvoption->load(Yii::$app->request->post())){

                    //  foreach($fvoption->featurevID as $fv){
                    //     $newoption=new \app\models\Fvoption();
                    //     $newoption->cartoptionID=$cartoption->id;
                    //     $newoption->featurevID=$fv;
                    //     $newoption->submitDate=Yii::$app->jdate->date('Y/m/d');
                    //     $newoption->save();

                    //    }
                    // }else{
                    //     $newoption=new \app\models\Fvoption();
                    //     $newoption->cartoptionID=$cartoption->id;
                    //     $newoption->submitDate=Yii::$app->jdate->date('Y/m/d');
                    //     $newoption->save();
                    // }

                    Yii::$app->session->setFlash('success', "محصول با موفقیت به سبد خرید افزوده شد.");

                } else {
                    Yii::$app->session->setFlash('error', "متاسفانه خطایی رخ داده است.");

                }
            }
            // var_dump($cartoption->errors);exit;
            return $this->refresh();
        }

        return $this->render('product', [
            'details' => $details,
            'detailsvalue' => $detailsvalue,
            'feature' => $feature,
            'featurevalue' => $featurevalue,
            'product' => $product,
            'cart' => $cart,
            'cartoption' => $cartoption,
            'fvoption' => $fvoption,
            'sizes' => $sizes,
            'imgs' => $imgs,
            'aboutproducts' => $aboutproducts,
            'count' => $count,
            'checkit' => $checkit,
            'comments' => $comments,
            'color' => $color,
            'catrelations' => $catrelations,
            'subcatrelations' => $subcatrelations,
            'letme' => $letme,
            'count' => $count,
            'sum' => $sum,

        ]);
    }

    /**
     * دسته بندی نوزاد
     *
     * @return string
     */
    public function actionBaby()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_baby
        ]);
        \Yii::$app->view->title = $setting->title_baby;

        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $model = new Product();
        $catrelations = \app\models\CategoryRelation::find()->Where(['catID' => 1])->all();
        $products = Product::find()->orderBy(['id' => SORT_DESC]);
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 50]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $imgs = \app\models\Productimg::find()->all();
        return $this->render('baby', compact('catrelations', 'imgs', 'articles', 'pagination', 'subcat', 'category', 'model', 'size', 'count', 'aboutproducts'));
    }

    /**
     * دسته بندی نوزاد
     *
     * @return string
     */
    public function actionChild()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_child
        ]);
        \Yii::$app->view->title = $setting->title_child;

        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $model = new Product();
        $catrelations = \app\models\CategoryRelation::find()->Where(['catID' => 2])->all();
        $products = Product::find()->orderBy(['id' => SORT_DESC]);

        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $imgs = \app\models\Productimg::find()->all();
        return $this->render('child', compact('catrelations', 'imgs', 'articles', 'pagination', 'subcat', 'category', 'model', 'size', 'count', 'aboutproducts'));
    }


}
