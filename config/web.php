<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language'=>'fa-IR',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'on beforeAction' => function ($event) { 
        ini_set('date.timezone', 'Asia/tehran');
        $url = Yii::$app->request->getAbsoluteUrl();
        $item=explode('https://www.',$url);
//        if($item[0]!=''){
//                Yii::$app->getResponse()->redirect('https://www.bccstyle.com/');
//                Yii::$app->end();
//        }
        // $pathInfo = Yii::$app->request->pathInfo;
        // $query = Yii::$app->request->queryString;
        // if (!empty($pathInfo) && substr($pathInfo, -1) === '/') {
        //     $url = '/' . substr($pathInfo, 0, -1);
        //     if ($query) {
        //         $url .= '?' . $query;
        //     }
        //     Yii::$app->response->redirect($url, 301);
        // }
        if(\Yii::$app->controller->module->id=="user" &&  \yii::$app->users->is_loged()==false){
                Yii::$app->response->redirect("/login");
        }
        if(\Yii::$app->controller->module->id=="admin" && \yii::$app->users->is_loged()==false){
            Yii::$app->response->redirect("/login");
        }
        if(\Yii::$app->controller->module->id=="user" && \yii::$app->users->GetRole()=='admin'){
            Yii::$app->response->redirect("/admin");
        }
        if(\Yii::$app->controller->module->id=="admin" && \yii::$app->users->GetRole()=='user'){
            Yii::$app->response->redirect("/user");
        }   
    },
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '60-jJvLblFM9YHYWlr0bJGEyBWShhYX1',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'jdate' => [
            'class' => 'jDate\DateTime'
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'users'=>[
            'class'=>'app\components\User',
        ],
        'api' => [
            'class' => 'app\components\Api'
        ],
        'sms'=>[
            'class'=>'app\components\Sms'
        ],
        'mellatbank' => [
            'class' => 'app\components\Mellatbank',
        ],
        'payment'=>[
            'class'=>'app\components\Payment'
        ],
        'zarinpal' => [
            'class' => 'amirasaran\zarinpal\Zarinpal',
            'merchant_id' => '081df5a6-7097-11e9-be6e-000c29344814',
            'callback_url' => 'http://37.152.178.208/endstep/verify',
            'testing' => false, // if you are testing zarinpal set it true, else set to false
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6LdxxaEUAAAAANQUC9bIMYsoU0F68mai7g-jooqi',
            'secret' => '6LdxxaEUAAAAACoJibZN33IbuF0af6gRhnMI-m7Z',
            ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
  
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            // 'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.bccstyle.com',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => 'info@bccstyle.com',
                'password' => 'F3wWsMsUJ',
                'port' => '25', // Port 25 is a very common port too
                //  'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => '127.0.0.1:9202'],
                // configure more hosts if you have a cluster
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'api/feature/<id:\d+>'=>'api/feature/show',
                'api/feature'=>'api/feature/show',
                'api/details/<id:\d+>'=>'api/details/show',
                'api/details'=>'api/details/show',
                'api/img/<id:\d+>'=>'api/img/show',
                'api/img'=>'api/img/show',
                'api/category/<id:\d+>'=>'api/category/show',
                'api/category'=>'api/category/show',
                'api/featu/<name:\w+>'=>'api/featu/size',
                'api/featu'=>'api/featu/size',
               // 'api/cat/<id:\d+>'=>'api/cat/show', 
                'api/subcat/<id:\d+>'=>'api/subcat/show',
                'api/subcat'=>'api/subcat/show',
                'api/size/<id:\d+>'=>'api/size/show',
                'api/size'=>'api/size/show',
                'api/plan/<id:\d+>'=>'api/plan/show',
                'api/plan'=>'api/plan/show',  
                'api/product'=>'api/product/show',
                'api/product/<catID:\d+>'=>'api/product/show',
                'api/product/<catID:\d+>/<subcatID:\d+>'=>'api/product/show',
                'api/product/<catID:\d+>/<subcatID:\d+>/<planID:\d+>'=>'api/product/show',
                'api/url'=>'api/url/show',
                'api/url/<categoryID:\d+>'=>'api/url/show',
                'api/filter'=>'api/filter/show',
                'api/filter/<categoryID:\d+>'=>'api/filter/show',
                'api/filter/<categoryID:\d+>/<subcatID:\d+>'=>'api/filter/show',
                'api/filter/<categoryID:\d+>/<subcatID:\d+>/<planID:\d+>'=>'api/filter/show',
                'api/filter/<categoryID:\d+>/<subcatID:\d+>/<planID:\d+>/<colorID:\d+>'=>'api/filter/show',
                'api/filter/<categoryID:\d+>/<subcatID:\d+>/<planID:\d+>/<colorID:\d+>/<name>'=>'api/filter/show',
                'api/collection'=>'api/collection/show',
                'api/collection/<categoryID:\d+>'=>'api/collection/show',
                'api/collection/<categoryID:\d+>/<subcatID:\d+>'=>'api/collection/show',
                'api/collection/<categoryID:\d+>/<subcatID:\d+>/<planID:\d+>'=>'api/collection/show',
                'api/collection/<categoryID:\d+>/<subcatID:\d+>/<planID:\d+>/<colorID:\d+>'=>'api/collection/show',
                'api/collection/<categoryID:\d+>/<subcatID:\d+>/<planID:\d+>/<colorID:\d+>/<name>'=>'api/collection/show',
                'api/city/<id:\d+>'=>'api/city/show',
                'api/city'=>'api/city/show',  
                'api/express/<id:\d+>'=>'api/express/show',
                'api/express'=>'api/express/show',  
                'api/featurev/<id:\d+>'=>'api/featurev/show', 
                'api/limit/<id:\d+>'=>'api/limit/show',
                'api/subject'=>'api/subject/show', 
                'search'=>'site/search', 
                'login'=>'/site/login',
                // 'blogsingle/<id:\d+>'=>'site/blogsingle',
                'site/confirm/<id:\d+>'=>'site/confirm',
             [
                'pattern' => 'collections',
                'route' => 'plan/index',
                'suffix' => '/',
            ],
            [
                'pattern' => 'collections/<name>',
                'route' => 'plan/collections',  
                'suffix' => '/',
            ],
            //  [
            //     'pattern' => 'collections/<name>',
            //     'route' => 'plan/planproduct',
            //     'suffix' => '/',
            // ],
            [
                'pattern' => 'product/<id:\d+>/<name>',  
                'route' => 'product/product',
                'suffix' => '/',  
            ],
             [
                'pattern' => 'product/<name>',       
                'route' => 'product/product',
                'suffix' => '/',
            ],
             [
                'pattern' => 'index',
                'route' => 'site/index',
                'suffix' => '/',
            ],
             [
                'pattern' => 'login',
                'route' => 'site/login',
                'suffix' => '/',
            ],
             [
                'pattern' => 'register',
                'route' => 'site/register',
                'suffix' => '/',
            ],
             [
                'pattern' => 'logouted',
                'route' => 'site/logouted',
                'suffix' => '/',
            ],
             [
                'pattern' => 'cart',
                'route' => 'cart/cart',
                'suffix' => '/',
            ],
             [
                'pattern' => 'contactus',
                'route' => 'site/contactus',
                'suffix' => '/',
            ],
             [
                'pattern' => 'transport',
                'route' => 'site/transport',
                'suffix' => '/',
            ],
             [
                'pattern' => 'size',
                'route' => 'site/size',
                'suffix' => '/',
            ],
            //  [
            //     'pattern' => 'blog',
            //     'route' => 'site/blog',
            //     'suffix' => '/',
            // ],
             [
                'pattern' => 'about',
                'route' => 'site/about',
                'suffix' => '/',
            ],
             [
                'pattern' => 'branches',
                'route' => 'branches/index',
                'suffix' => '/',
            ],
             [
                'pattern' => 'certificates',
                'route' => 'site/certificates',
                'suffix' => '/',
            ],
             [
                'pattern' => 'privacy',
                'route' => 'site/privacy',
                'suffix' => '/',
            ],
            
             [
                'pattern' => 'help',
                'route' => 'help/index',
                'suffix' => '/',
            ],
          
             [
                'pattern' => 'faq',
                'route' => 'faq/index',
                'suffix' => '/',
            ],
        
             [
                'pattern' => 'baby',
                'route' => 'product/baby',
                'suffix' => '/',
            ],
             [
                'pattern' => 'product/boybaby',
                'route' => 'product/boybaby',
                'suffix' => '/',
            ],
             [
                'pattern' => 'product/girlbaby',
                'route' => 'product/girlbaby',
                'suffix' => '/',
            ],
             [
                'pattern' => 'child',
                'route' => 'product/child',
                'suffix' => '/',
            ],
             [
                'pattern' => 'girlgrid',
                'route' => 'product/girlgrid',
                'suffix' => '/',
            ],
             [
                'pattern' => 'boygrid',
                'route' => 'product/boygrid',
                'suffix' => '/',
            ],
             [
                'pattern' => 'product/index',
                'route' => 'product/index',
                'suffix' => '/',
            ],
             [
                'pattern' => 'product/index2',
                'route' => 'product/index2',
                'suffix' => '/',
            ],
            //  [
            //     'pattern' => 'baby-clothing/baby-clothes-gift-set/<name>',
            //     'route' => 'product/menulink',
            //     'suffix' => '/',
            // ],
             [
                'pattern' => 'baby-clothing/baby-clothes-gift-set/<name>',
                'route' => 'product/towel',
                'suffix' => '/',
            ],
            //  [
            //     'pattern' => 'baby-clothing/baby-clothes-gift-set',
            //     'route' => 'product/set',
            //     'suffix' => '/',
            // ],
             [
                'pattern' => 'baby-clothing/baby-clothes-gift-set',
                'route' => 'product/sets',
                'suffix' => '/',
            ],
            [
                'pattern' => 'thankyou',
                'route' => 'site/thankyou',
                'suffix' => '/',
            ],
            [
                'pattern' => 'failed',
                'route' => 'site/failed',
                'suffix' => '/',
            ],
          
            [
                'pattern' => 'endstep',
                'route' => 'endstep/index',
                'suffix' => '/',
            ],
             [
                'pattern' => 'download/<id:\d+>',
                'route' => 'site/download',
                'suffix' => '/',
            ],
             [
                'pattern' => 'baby-clothing',
                'route' => 'site/category',
                'suffix' => '/',
            ],
            [
                'pattern' => 'baby-clothing/<id:\d+>/<urltitle>', 
                'route' => 'product/babycat',
                'suffix' => '/', 
            ],   
             [
                'pattern' => 'baby-clothing/<urltitle>', 
                'route' => 'product/babycat',
                'suffix' => '/', 
            ],
             [
                'pattern' => 'notificationone',
                'route' => 'site/notificationone',
                'suffix' => '/',
            ],
          

            ],
        ],
        
    ],
  //  'params' => $params,
     'params' => [
        'bsDependencyEnabled' => false, // this will not load Bootstrap CSS and JS for all Krajee extensions 
        // you need to ensure you load the Bootstrap CSS/JS manually in your view layout before Krajee CSS/JS assets
        //
        // other params settings below
        // 'bsVersion' => '4.x', 
        // 'adminEmail' => 'admin@example.com'
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout'=>'main',
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
        'gridview' => ['class' => 'kartik\grid\Module'],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '*'],
    ];
}

return $config;
