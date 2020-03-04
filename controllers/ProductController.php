<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
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
        $model = new \app\models\Product();
        // $products=\app\models\Product::find()->Where(['status'=>1])->orderBy(new Expression('rand()'));
        $products = \app\models\Product::find()->Where(['status' => 1])->orderBy(['off' => SORT_DESC]);
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
        $model = new \app\models\Product();
        $products = \app\models\Product::find()->Where(['status' => 1])->orderBy(new Expression('rand()'));
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
        $model = new \app\models\Product();
        $products = \app\models\Product::find()->Where(['status' => 2]);
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

        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $size = new \app\models\Size();
        $model = new \app\models\Product();
        $catrelations = \app\models\CategoryRelation::find()->Where(['catID' => 1])->all();
        foreach ($catrelations as $catrelationsitem) {
            $arraycat[$catrelationsitem->productID] = $catrelationsitem->productID;
        }
        $subcatrelations = \app\models\SubcatRelation::find()->Where(['subcatID' => 9])->all();
        foreach ($subcatrelations as $subcatrelationitem) {
            $arraysub[$subcatrelationitem->productID] = $subcatrelationitem->productID;
        }
        $products = \app\models\Product::find()->Where(['status' => 1])->andWhere(['id' => $arraycat])->andWhere(['id' => $arraysub]);
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 21]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $imgs = \app\models\Productimg::find()->all();
        return $this->render('girlgrid', compact('catrelations', 'subcatrelations', 'subcat', 'imgs', 'articles', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts', 'aboutproducts'));
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
            'content' => $setting->description_boygrid
        ]);
        \Yii::$app->view->title = $setting->title_boygrid;

        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $model = new \app\models\Product();
        $catrelations = \app\models\CategoryRelation::find()->Where(['catID' => 1])->all();
        foreach ($catrelations as $catrelationsitem) {
            $arraycat[$catrelationsitem->productID] = $catrelationsitem->productID;
        }
        $subcatrelations = \app\models\SubcatRelation::find()->Where(['subcatID' => 10])->all();
        foreach ($subcatrelations as $subcatrelationitem) {
            $arraysub[$subcatrelationitem->productID] = $subcatrelationitem->productID;
        }
        $products = \app\models\Product::find()->Where(['status' => 1])->andWhere(['id' => $arraycat])->andWhere(['id' => $arraysub]);
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 21]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $imgs = \app\models\Productimg::find()->all();
        return $this->render('boygrid', compact('catrelations', 'subcatrelations', 'imgs', 'subcat', 'articles', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts'));
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
        $model = new \app\models\Product();
        $catrelations = \app\models\CategoryRelation::find()->Where(['catID' => 2])->all();
        $subcatrelations = \app\models\SubcatRelation::find()->Where(['subcatID' => 9])->all();
        $products = \app\models\Product::find()->Where(['status' => 1]);
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
        $model = new \app\models\Product();
        $catrelations = \app\models\CategoryRelation::find()->Where(['catID' => 2])->all();

        $subcatrelations = \app\models\SubcatRelation::find()->Where(['subcatID' => 10])->all();
        $products = \app\models\Product::find()->Where(['status' => 1]);
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
        $products = \app\models\Product::find()->Where(['status' => 1])->andWhere(['LIKE', 'name', $strname])->orderBy(['id' => SORT_DESC]);
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->all();
        $model = new \app\models\Product();
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
        $products = \app\models\Product::find()->Where(['status' => 1])->andWhere(['LIKE', 'name', $strname])->orderBy(['id' => SORT_DESC]);
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->all();
        $model = new \app\models\Product();
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
        $products = \app\models\Product::find()->Where(['status' => 1])->andWhere(['LIKE', 'name', $strname])->orderBy(['id' => SORT_DESC]);
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->all();
        $model = new \app\models\Product();
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
        $products = \app\models\Product::find()->Where(['status' => 1])->andWhere(['LIKE', 'name', $strname])->orderBy(['id' => SORT_DESC]);
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->all();
        $model = new \app\models\Product();
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 8]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('sets', compact('imgs', 'articles', 'subcat', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts'));
    }

    public function actionBabycat($id = null, $urltitle)
    {
        $categoryName = Yii::$app->getRequest()->getQueryParam('categoryName');
        $aboutproducts = \app\models\Aboutproduct::find()->all();
        // $strname=str_replace('-',' ',$name);
        if ($id != null) {
            $catproducts = \app\models\Catproduct::find()->Where(['id' => $id])->one();
        } else {
            $catproducts = \app\models\Catproduct::find()->Where(['urltitle' => $urltitle])->one();
        }
        $contentcategory = \app\models\Contentcategory::find()->Where(['catID' => $catproducts->id])->orderBy(['id' => SORT_DESC])->one();

        $products = \app\models\Product::find()->Where(['status' => 1])->andWhere(['catproductID' => $catproducts->id])->orderBy(['id' => SORT_DESC]);
        $category = new \app\models\Category();
        $subcat = new \app\models\Subcat();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->all();
        $model = new \app\models\Product();
        $countQuery = clone $products;
        $count = $countQuery->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 12]);
        $articles = $products->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $catproduct = \app\models\Catproduct::find()->Where(['urltitle' => $urltitle])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $catproduct->description
        ]);
        \Yii::$app->view->title = $catproduct->title;
        return $this->render('babycat', compact('imgs', 'articles', 'subcat', 'pagination', 'category', 'model', 'size', 'count', 'aboutproducts', 'contentcategory', 'categoryName'));
    }

    ////product details

    public function actionProduct($id = null)
    {

        date_default_timezone_set("Asia/tehran");
        if ($id != null) {
            $product = \app\models\Product::find()->where(['id' => $id])->one();
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

            $cart = new \app\models\Cart();
            $cartoption = new \app\models\Cartoption();
            $fvoption = new \app\models\Fvoption();
            $featurevalue = \app\models\Featurevalue::find()->where(['productID' => $product->id])->all();
            $checkit = new \app\models\Checkit();
            $letme = new \app\models\Letme();


        if(Yii::$app->request->isPost){

            $isLogged = \yii::$app->users->is_loged();
            $carId    = \yii::$app->session['cart_id'];

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

                if ((!isset($carId)) && $isLogged == true ) {
                    $cart = \app\models\Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 0])->andWhere(['submitDate' => Yii::$app->jdate->date('Y/m/d')])->one();
                    $cart->userID = \yii::$app->session['user_id'];
                    $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                    $cart->status = 0;
                    $cart->save();
                    $carId = $cart->id;
                } elseif ((!isset($carId)) && $isLogged == true ) {
                    $cart->userID = \yii::$app->session['user_id'];
                    $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                    $cart->status = 0;
                    $cart->save();
                    $carId = $cart->id;
                } elseif ((!isset($carId)) && $isLogged == false) {
                    $time = time();
                    \yii::$app->session['guest_id'] = $time;
                    $cart->userID = \yii::$app->session['guest_id'];
                    $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                    $cart->status = 0;
                    $cart->save();
                    $carId = $cart->id;
                } elseif ((isset($carId)) && $isLogged == false) {
                    $cart = \app\models\Cart::find()->Where(['id' => $carId])->one();
                    $time = time();
                    \yii::$app->session['guest_id'] = $time;
                    $cart->userID = \yii::$app->session['guest_id'];
                    $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                    $cart->status = 0;
                    $cart->save();
                    $carId = $cart->id;
                } elseif (isset($carId) && (\app\models\Cart::find()->Where(['id' => $carId])->andWhere(['userID' => \yii::$app->session['user_id']])->andWhere(['status' => 0])->andwhere(['submitDate' => \Yii::$app->jdate->date('Y/m/d')])->one()) && $isLogged == true) {
                    $cart = \app\models\Cart::find()->Where(['id' => $carId])->one();
                    $cart->userID = \yii::$app->session['user_id'];
                    $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                    $cart->status = 0;
                    $cart->save();
                } elseif (isset($carId) && (\app\models\Cart::find()->Where(['id' => $carId])->andWhere(['userID' => \yii::$app->session['user_id']])->andWhere(['status' => 1])->andwhere(['submitDate' => \Yii::$app->jdate->date('Y/m/d')])->one()) && $isLogged == true) {
                    if ($carts = \app\models\Cart::find()->Where(['id' => $carId])->one()) {
                        unset($carId);
                        unset(\Yii::$app->session['guest_id']);
                    }
                    $carts = \app\models\Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 0])->andWhere(['submitDate' => Yii::$app->jdate->date('Y/m/d')])->one();
                    if ($carts) {
                        $carts->userID = \yii::$app->session['user_id'];
                        $carts->submitDate = Yii::$app->jdate->date('Y/m/d');
                        $carts->status = 0;
                        $carts->save();
                        $carId = $carts->id;
                    } else {
                        $cart->userID = \yii::$app->session['user_id'];
                        $cart->submitDate = Yii::$app->jdate->date('Y/m/d');
                        $cart->status = 0;
                        $cart->save();
                        $carId = $cart->id;
                    }
                }
                if (\app\models\Cartoption::find()->Where(['cartID' => $carId])->andWhere(['productID' => $product->id])->one()) {
                    $coption = \app\models\Cartoption::find()->Where(['cartID' => $carId])->andWhere(['productID' => $product->id])->one();
                    $fvoption = \app\models\Fvoption::find()->Where(['cartoptionID' => $coption->id])->one();
                    if ($fvoption->featurevID == Yii::$app->request->post('cartprice')) {
                        $coption->count += Yii::$app->request->post('countproduct');
                        if ($coption->save()) {
                            Yii::$app->session->setFlash('success', "محصول با موفقیت به سبد خرید افزوده شد.");
                        } else {
                            Yii::$app->session->setFlash('error', "متاسفانه خطایی رخ داده است.");
                        }
                    } else {
                        $cartoption->cartID = $carId;
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

                    $cartoption->cartID = $carId;
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

                        Yii::$app->session->setFlash('success', "محصول با موفقیت به سبد خرید افزوده شد.");

                    } else {
                        Yii::$app->session->setFlash('error', "متاسفانه خطایی رخ داده است.");

                    }
                }
                // var_dump($cartoption->errors);exit;
                return $this->refresh();
            }
            return Yii::$app->response->redirect(Url::to(['cart/cart']));
        }


        $imgs = \app\models\Productimg::find()->where(['productID' => $product->id])->all();
        $catrelations = \app\models\CategoryRelation::find()->where(['productID' => $product->id])->all();//cc
        $subcatrelations = \app\models\SubcatRelation::find()->where(['productID' => $product->id])->all();
        $aboutproducts = \app\models\Aboutproduct::find()->where(['productID' => $product->id])->all();
        $color = \app\models\Color::find()->all();//cc
        $feature = \app\models\Feature::find()->all();//cc

        $details = \app\models\Details::find()->all();//c
        $detailsvalue = \app\models\Detailsvalue::find()->where(['productID' => $product->id])->all();
        $count = \app\models\Cartoption::find()->Where(['productID' => $product->id])->sum('count');
        $sizes = \app\models\Size::find()->all();//cc
        $comments = \app\models\Checkit::find()->Where(['productID' => $product->id])->all();//cc
        $count = \app\models\Checkit::find()->Where(['productID' => $product->id])->count();//cc
        $sum = \app\models\Checkit::find()->Where(['productID' => $product->id])->sum('rate');//cc


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
        $model = new \app\models\Product();
        $catrelations = \app\models\CategoryRelation::find()->Where(['catID' => 1])->all();
        $products = \app\models\Product::find()->orderBy(['id' => SORT_DESC]);
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
        $model = new \app\models\Product();
        $catrelations = \app\models\CategoryRelation::find()->Where(['catID' => 2])->all();
        $products = \app\models\Product::find()->orderBy(['id' => SORT_DESC]);

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
