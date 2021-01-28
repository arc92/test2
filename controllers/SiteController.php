<?php

namespace app\controllers;

use app\models\Jobs\SendSms;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use hoomanMirghasemi\jdf\Jdf;
use app\models\Upload;
use yii\web\UploadedFile;
use yii\db\Expression;
use yii\data\Pagination;

class SiteController extends Controller
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
    // public function actions()
    // {
    //     return [
    //         'captcha' => [
    //             'class' => 'yii\captcha\CaptchaAction',
    //         ],
    //     ];
    // }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionMellat()
    {

        \yii::$app->mellatbank->Request(1000, "http://37.152.178.208//site/mellatback");
    }

    public function actionMellatback()
    {
        var_dump(\yii::$app->mellatbank->Callback(\yii::$app->request->post()));
        \yii::$app->mellatbank->Callback(\yii::$app->request->post());
    }

    public function actionIndex()
    {
        var_dump(1);die();
        //    unset(\Yii::$app->session['cart_id']);
        // unset(\Yii::$app->session['guest_id']);
        // var_dump( (\Yii::$app->session['cart_id']));
        // var_dump( (\Yii::$app->session['guest_id']));
        // exit;

        // var_dump($count=\app\models\Cart::find()->Where(['userID'=>\Yii::$app->session['user_id']])->andWhere(['status'=>0])->andWhere(['submitDate'=>Yii::$app->jdate->date('Y/m/d')])->count());exit;

        // var_dump(Yii::$app->jdate->date('Y/m/d H:m:s'));exit;
        $this->layout = 'layout';

        if (!Yii::$app->cache->exists('setting')) {
            $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
            \Yii::$app->cache->set('setting', $setting, 3600 * 24 * 7);
        }

        $setting = \Yii::$app->cache->get('setting');

        $plans = \app\models\Plan::find()->Where(['status' => 1])->all();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description
        ]);
        \Yii::$app->view->title = $setting->title;
        return $this->render('index', [
            'plans' => $plans,
            'setting' => $setting,
        ]);
    }

    public function actionDelete($id)
    {
        $address = \app\models\Cartoption::findOne($id)->delete();


        return $this->redirect(['/site/index']);
    }


    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionSearch()
    {
        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $category = new \app\models\Category();
        $size = new \app\models\Size();
        $subcat = new \app\models\Subcat();
        $model = new \app\models\Product();
        $img = new \app\models\Productimg();
        if ($model->load(\yii::$app->request->post())) {
            $search = \app\models\Product::find();
            // foreach(\app\models\Category::find()->where(['LIKE','name',$model->name])->all() as $cat){
            //     $search=$search->orWhere(['catID'=>$cat->id]);
            // }
            $search = $search->Where(['LIKE', 'name', $model->name])->all();
            if (empty($search)) {
                \Yii::$app->session->setFlash('error-search', 'نتیجه ای یافت نشد');
            }

        }
        return $this->render('search', [
            'search' => $search,
            'model' => $model,
            'category' => $category,
            'img' => $img,
            'aboutproducts' => $aboutproducts,
            'size' => $size,
            'subcat' => $subcat,
        ]);
    }

    public function actionBlog()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_blog
        ]);
        \Yii::$app->view->title = $setting->title_blog;
        //  var_dump(Yii::$app->jdate->date('Y/m/d'));exit;
        // var_dump( Jdf::jdate('Y/m/d'));exit;
        //  \yii::$app->payment->melli_request("1000",time(),"/endstep/callback?id=".$model->id);
        // توی کال بک csrf token disable باشه
        // $callbackData=\yii::$app->payment->melli_callback($_POST["OrderId"],$_POST["token"],$_POST["ResCode"]);
        // if($callbackData['status']==1){
        //     save in database rerencecode or refercode
        //     $callbackData['referCode']
        //     $callbackData['refrenceCode']
        // }else{
        //      echo "تراکنش نا موفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد.";
        // }
        $blogs = \app\models\Blog::find()->orderBy(['id' => SORT_DESC])->Where(['status' => 1])->all();
        $category = \app\models\Blogcat::find()->all();
        $imgs = \app\models\Blogimg::find()->all();

        $model = new \app\models\Blog();
        if ($model->load(\yii::$app->request->post())) {
            $blogs = \app\models\Blog::find()->where(['like', 'name', $model->name])->andWhere(['status' => '1'])->all();
            // var_dump($blogs);exit;
        }

        return $this->render('blog', [
            'blogs' => $blogs,
            'category' => $category,
            'imgs' => $imgs,

        ]);
    }

    public function actionBlogsingle($id)
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_blogsingle
        ]);
        \Yii::$app->view->title = $setting->title_blogsingle;
        $blog = \app\models\Blog::find()->Where(['id' => $id])->orderBy(['id' => SORT_DESC])->one();
        $weblogs = \app\models\Blog::find()->all();
        $cat = \app\models\Blogcat::find()->Where(['id' => $blog->catID])->one();
        $category = \app\models\Blogcat::find()->all();
        $imgs = \app\models\Blogimg::find()->Where(['blogID' => $id])->all();
        $blogcomment = \app\models\Blogcomment::find()->Where(['status' => 1, 'blogID' => $id])->all();
        $tags = \app\models\Tagblog::find()->Where(['blogId' => $id])->all();
        $comment = new \app\models\Blogcomment();
        if ($comment->load(Yii::$app->request->post())) {
            if (\yii::$app->users->is_loged() && \yii::$app->users->GetRole() != 'admin') {
                $comment->userID = \yii::$app->session['user_id'];
            } else {
                $comment->userID = 0;
            }
            $comment->blogID = $id;
            $comment->status = 0;
            $comment->create_date = Yii::$app->jdate->date('Y/m/d');
            if ($comment->save()) {
                Yii::$app->session->setFlash('success', "کاربر گرامی اطلاعات شما با موفقیت ثبت شد");
            } else {
                Yii::$app->session->setFlash('error', "متاسفانه خطایی رخ داده است.");
            }
        }

        return $this->render('blogsingle', [
            'blog' => $blog,
            'imgs' => $imgs,
            'category' => $category,
            'comment' => $comment,
            'blogcomment' => $blogcomment,
            'tags' => $tags,
            'weblogs' => $weblogs,
            'cat' => $cat,
        ]);
    }

    public function actionAccount()
    {
        return $this->render('account');
    }

    public function actionAddcomment()
    {
        return $this->render('addcomment');
    }

    public function actionBeforeregister()
    {
        $this->layout = 'layout2';
        return $this->render('beforeregister');
    }


    /*Login*/
    public function actionLogin()
    {
        $this->layout = 'layout2';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $Users = new \app\models\Users();

        if ($Users->load(Yii::$app->request->post())) {
            if (\yii::$app->users->login($Users->username, $Users->password)) {
                //  var_dump(\Yii::$app->session['guest_id']);exit;
                if (\yii::$app->users->GetRole() == 'user') {
                    $counts = \app\models\Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 0])->andWhere(['!=', 'submitDate', Yii::$app->jdate->date('Y/m/d')])->count();
                    if ($counts >= 1) {
                        foreach (\app\models\Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 0])->andWhere(['!=', 'submitDate', Yii::$app->jdate->date('Y/m/d')])->all() as $a) {
                            $a->delete();
                        }
                    }
                    $count = \app\models\Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 0])->andWhere(['submitDate' => Yii::$app->jdate->date('Y/m/d')])->count();
                    if ($count > 1) {
                        unset(\Yii::$app->session['cart_id']);
                        unset(\Yii::$app->session['guest_id']);
                        foreach (\app\models\Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 0])->andWhere(['submitDate' => Yii::$app->jdate->date('Y/m/d')])->all() as $c) {
                            $c->delete();

                        }
                    }
                    $cartcheck = \app\models\Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 0])->andWhere(['submitDate' => Yii::$app->jdate->date('Y/m/d')])->count();
                    if (isset(\yii::$app->session['guest_id']) && $cartcheck == 1) {
                        $cartone = \app\models\Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 0])->andWhere(['submitDate' => Yii::$app->jdate->date('Y/m/d')])->one();
                        $cart = \app\models\Cart::find()->Where(['userID' => \Yii::$app->session['guest_id']])->one();
                        if ($cart == true) {
                            foreach (\app\models\Cartoption::find()->Where(['cartID' => $cart->id])->all() as $cartoption) {
                                $cartoption->cartID = $cartone->id;
                                $cartoption->save();
                            }
                            $cart->delete();
                            \yii::$app->session['cart_id'] = $cartone->id;
                        }
                    } elseif (isset(\yii::$app->session['guest_id']) && $cartcheck != 1) {
                        $cart = \app\models\Cart::find()->Where(['userID' => \Yii::$app->session['guest_id']])->one();
                        if ($cart == true) {
                            $cart->userID = \Yii::$app->session['user_id'];
                            $cart->save();
                            \yii::$app->session['cart_id'] = $cart->id;
                        }
                    }
                    if (isset(\yii::$app->session['afterpage'])) {
                        return $this->redirect(['/endstep/']);
                    } else {
                        return $this->redirect(['index']);
                    }
                } elseif (\yii::$app->users->GetRole() == 'admin') {
                    return $this->redirect(['/admin']);
                }


            } else {
                Yii::$app->session->setFlash('error', "ایمیل یا رمز عبور اشتباه است");
            }
        }
        $Users->password = '';
        return $this->render('login', [
            'Users' => $Users,
        ]);

    }

    /*Register */
    public function actionRegister()
    {

        $this->layout = 'layout2';

        $Users = new \app\models\Users();
        if ($Users->load(Yii::$app->request->post())) {
            $pass = $Users->password;
            $Users->password = \Yii::$app->getSecurity()->generatePasswordHash($Users->password);
            $Users->role = 'user';
            $Users->has_mobile = 'mobile';
            $Users->submitDate = time();
            $Users->active = 1;
            \yii::$app->session['mobile'] = $Users->mobile;
            if ($Users->save()) {

                $Users->password = $pass;
                \Yii::$app->session['login'] = true;
                \Yii::$app->session['user_id'] = $Users->id;
                \Yii::$app->session['user_name'] = $Users->fullName;
//            \Yii::$app->mailer->compose()
//            ->setFrom('info@bccstyle.com')
//            ->setTo($Users->email)
//            ->setSubject('به      بی سی سی خوش آمدید   ')
//            ->send();
//            $text="به بی سی سی خوش آمدید کد تایید شما :".$Users->submitDate;
//          \yii::$app->sms->Send($Users->mobile,$text);
                \Yii::$app->session->setFlash('messageSignupClass', 'green');
                \Yii::$app->session->setFlash('messageSignup', ' ثبت نام با موفقیت انجام شد کد تایید به موبایل شما ارسال شده است.');

                //   return $this->redirect(['/site/activeaccount']);
                return $this->redirect(['index']);
                \Yii::$app->session->setFlash('success', 'کاربر گرامی اطلاعات شما با موفقیت ثبت شد');

            } else {
                \Yii::$app->session->setFlash('messageSignupClass', 'red');
                \Yii::$app->session->setFlash('messageSignup', 'ثبت نام ناموفق بود لطفا اطلاعات ورودی را بررسی کنید');

                $Users->password = '';

            }
        }
        return $this->render('register', [
            'Users' => $Users,
        ]);

    }

    public function actionForget()
    {
        $model = new \app\models\Users();

        if ($model->load(\yii::$app->request->post())) {
            if (\app\models\Users::find()->where(['mobile' => $model->mobile])->one()) {
                $password = time();
                $model = \app\models\Users::find()->where(['mobile' => $model->mobile])->one();
                $model->password = \Yii::$app->getSecurity()->generatePasswordHash($password);

                if ($model->save()) {
                    $text = "وب سایت بی سی سی تغییر رمز عبور شما با موفقیت انجام شد.  \nشماره موبایل : " . $model->mobile . "\n رمز عبور : " . $password;
                    \Yii::$app->queue->push(new SendSms([
                        'message' => $text,
                        'number' => $model->mobile,
                    ]));
                }
                \Yii::$app->session->setFlash('messageLogin', 'رمز یکبارمصرف شما ارسال شد جهت ورود از رمز یکبار مصرف استفاده کرده و از منو حساب کاربری اقدام به تغییر رمز نمایید');

                return $this->redirect(['/site/login']);
            } else {
                \Yii::$app->session->setFlash('error', 'شماره موبایل وارد شده صحیح نمیباشد');
                return $this->redirect(['/site/forget']);


            }
        }
        return $this->render('forget', compact('model'));
    }

    public function actionActiveaccount()
    {
        //var_dump(\yii::$app->session['mobile']);exit;
        $model = new \app\models\Users();
        if ($model->load(\yii::$app->request->post())) {

            if ($user = \app\models\Users::find()->where(['submitDate' => $model->submitDate])->one()) {
                $user->active = 1;
                $user->save();

                \Yii::$app->session['login'] = true;
                \Yii::$app->session['user_id'] = $user->id;
                \Yii::$app->session['user_name'] = $user->fullName;
                return $this->redirect(['/site/index']);
            } else {
                \Yii::$app->session->setFlash('messageSignupClass', 'red');
                \Yii::$app->session->setFlash('messageSignup', 'ثبت نام ناموفق بود لطفا کد تایید صحیح را وارد کنید');
            }
        }

        // $active=new \app\models\Users();
        if ((\yii::$app->request->post())) {
            if ($activeuser = \app\models\Users::find()->where(['mobile' => \yii::$app->session['mobile']])->one()) {
                $text = "به بی سی سی خوش آمدید کد تایید شما :" . $activeuser->submitDate;
                \Yii::$app->queue->push(new SendSms([
                    'message' => $text,
                    'number' => $activeuser->mobile,
                ]));
                \Yii::$app->session->setFlash('messageSignup', '  کد تایید به موبایل شما ارسال شد.');
                return $this->redirect(['/site/activeaccount']);
            } else {
                \Yii::$app->session->setFlash('messageSignupClass', 'red');
                \Yii::$app->session->setFlash('messageSignup', 'ثبت نام ناموفق بود لطفا کد تایید صحیح را وارد کنید');
            }
        }


        return $this->render('activeaccount', compact('model'));
    }

    ////*My Favourites

    public function actionMyfavourites()
    {
        return $this->render('myfavourites');
    }

    ////*My Favourites

    public function actionMymeasures()
    {
        return $this->render('mymeasures');
    }

    public function actionOrdermap()
    {
        return $this->render('ordermap');
    }

    public function actionProductdetails()
    {
        return $this->render('productdetails');
    }

    public function actionProductdetailsnotification()
    {
        return $this->render('productdetailsnotification');
    }


    public function actionProductlistgrid()
    {
        return $this->render('productlistgrid');
    }

    public function actionShoppingendstep()
    {
        return $this->render('shoppingendstep');
    }

    public function actionPay()
    {
        $this->layout = false;
        // $params = Yii::$app->request->post('MellatBank');
        // if($params !== null) {
        $mellatbank = new \mihandev\gateway\MellatBank();
        return $mellatbank->startPayment([
            'terminal' => 1987903,
            'username' => 'bcc73',
            'password' => '99863608',
            'amount' => 1000,
            'callBackUrl' => ['/site/callbackmelat']
        ]);
        // }
    }

    public function actionCallbackmelat()
    {
        $mellatbank = new \mihandev\gateway\MellatBank();
        $config = [
            'terminal' => 1987903,
            'username' => 'bcc73',
            'password' => '99863608',
            'amount' => 1000,
        ];

        $result = $mellatbank->checkPayment($config, $_POST);
        if ($result !== null && $result["status"] == "success") {
            // payment is success ...
            echo "okkkkkkkkkkk";
            echo $result;
        }
    }

    public function actionStorelist()
    {
        return $this->render('storelist');
    }

    public function actionNotificationone()
    {
        $this->layout = 'layout2';
        return $this->render('notificationone');
    }

    public function actionNotificationpay()
    {
        $this->layout = 'layout2';
        return $this->render('notificationpay');
    }

    public function actionConfirm()
    {
        return $this->render('confirm');
    }

    public function actionFailed()
    {
        return $this->render('failed');
    }

    public function actionPrivacy()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_privacy
        ]);
        \Yii::$app->view->title = $setting->title_privacy;
        $privacy = \app\models\Privacy::find()->orderBy(['id' => SORT_DESC])->one();
        return $this->render('privacy', [
            'privacy' => $privacy,
        ]);
    }

    public function actionTransport()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_transport
        ]);
        \Yii::$app->view->title = $setting->title_transport;
        $transport = \app\models\Transport::find()->orderBy(['id' => SORT_DESC])->one();
        return $this->render('transport', [
            'transport' => $transport,
        ]);
    }

    public function actionSizetable()
    {
        $size = \app\models\Size::find()->all();
        $sizeone = \app\models\Size::find()->orderBy(['id' => SORT_DESC])->one();
        return $this->render('sizetable', [
            'size' => $size,
            'sizeone' => $sizeone,
        ]);
    }

    public function actionSize()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_size
        ]);
        \Yii::$app->view->title = $setting->title_size;
        $sizes = \app\models\Sizeimg::find()->all();

        return $this->render('size', [
            'sizes' => $sizes,
        ]);
    }



    /**
     * Login action.
     *
     * @return Response|string
     */
    // public function actionLogin()
    // {
    //     if (!Yii::$app->user->isGuest) {
    //         return $this->goHome();
    //     }

    //     $model = new LoginForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->login()) {
    //         return $this->goBack();
    //     }

    //     $model->password = '';
    //     return $this->render('login', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogouted()
    {
        \yii::$app->users->Logout();
        return $this->redirect('/');
        //  return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContactus()
    {
        // $model = new ContactForm();
        // if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
        //     Yii::$app->session->setFlash('contactFormSubmitted');

        //     return $this->refresh();
        // }

        $contactus = \app\models\Contactus::find()->one();
        $question = new \app\models\Question();
        $upload = new Upload();

        if ($question->load(Yii::$app->request->post())) {
            $question->status = 0;
            $question->submitDate = Yii::$app->jdate->date('Y/m/d');
            $upload->imgFile = UploadedFile::getInstance($upload, 'imgFile');
            if ($upload->imgFile != null)
                $question->file = $upload->upload();
            $question->save();
            // var_dump( $question->errors);exit;
            if ($question->save()) {

                \Yii::$app->session->setFlash('success', 'کاربر گرامی اطلاعات شما با موفقیت ثبت شد');
                return $this->refresh();
            } else {
                \Yii::$app->session->setFlash('error', 'کاربر گرامی خطایی رخ داده است، لطفا مجددا تلاش کنید.');
            }
        }

        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_contactus
        ]);
        \Yii::$app->view->title = $setting->title_contactus;

        return $this->render('contactus', [
            'question' => $question,
            'contactus' => $contactus,
            'upload' => $upload,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $aboutus = \app\models\Aboutus::find()->orderBy(['id' => SORT_DESC])->one();
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_aboutus
        ]);
        \Yii::$app->view->title = $setting->title_aboutus;

        $aboutimgs = \app\models\Aboutimg::find()->all();
        $history = \app\models\History::find()->orderBy(['id' => SORT_DESC])->all();


        return $this->render('about', [
            'aboutus' => $aboutus,
            'aboutimgs' => $aboutimgs,
            'history' => $history,
        ]);
    }

    public function actionTest()
    {

        $model = \app\models\Bascket::find()->Where(['id' => 2191])->one();
        $cart = \app\models\Cart::find()->Where(['id' => $model->cartID])->one();
        $user = \app\models\Users::find()->Where(['id' => $cart->userID])->one();
        return $this->render('test', [
            'model' => $model,
            'cart' => $cart,
            'user' => $user,
        ]);
    }

    public function actionCategory()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_baby_clothing
        ]);
        \Yii::$app->view->title = $setting->title_baby_clothing;

        $slider = \app\models\Slider::find()->Where(['status' => 2])->all();
        $set = \app\models\Setbabycat::find()->Where(['status' => 1])->all();
        $piccat = \app\models\Piccat::find()->orderBY(['id' => SORT_DESC])->one();
        $category = \app\models\Catproduct::find()->Where(['staus' => 1])->orderBy(['sort' => SORT_ASC])->all();
        $subcat = new \app\models\Subcat();
        $aboutproducts = \app\models\Aboutproduct::find()->all();
        $size = new \app\models\Size();
        $imgs = \app\models\Productimg::find()->one();
        $model = new \app\models\Product();
        $products = \app\models\Product::find()->Where(['status' => 1])->andWhere(['LIKE', 'name', 'ست نوزادی'])->orderBy(['id' => SORT_DESC]);
        $plans = \app\models\Plan::find()->Where(['status' => 1])->all();

        return $this->render('category', compact('imgs', 'products', 'category', 'model', 'size', 'count', 'aboutproducts', 'subcat', 'plans', 'slider', 'piccat', 'set'));
    }

    public function actionThankyou()
    {
        return $this->render('thankyou');
    }

    public function actionFailpayment()
    {
        return $this->render('failpayment');
    }


    public function actionCertificates()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_certificates
        ]);
        \Yii::$app->view->title = $setting->title_certificates;
        $models = \app\models\Certificates::find()->all();
        return $this->render('certificates', [
            'models' => $models,

        ]);
    }

    public function actionDownload($id)
    {
        $file = \app\models\Question::find()->Where(['id' => $id])->one();
        $path = \Yii::getAlias('@webroot') . '/uploads/' . $file->file;
        \yii::$app->response->sendFile($path);
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if ($action->id == 'mellatback') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }
}
