<?php
use yii\helpers\Html;
use yii\helpers\Url;

\Yii::$app->mailer->compose('factor/index', ['model' => $model,'user'=>$user])
->setFrom('info@bccstyle.com')
->setTo('rezvan.tayefe.66@gmail.com')
->setSubject('به      بی سی سی خوش آمدید   ') 
 ->send(); 
 
 
























// $url = Yii::$app->request->getAbsoluteUrl();
// $urls=parse_url("https://www.bccstyle.com/baby-clothing/baby-pants-trousers/?page=3&per-page=12"); 
// $str=($urls['host']);
// $str.=($urls['path']);
// var_dump($str);
// $url = Yii::$app->request->getAbsoluteUrl();
// $item=explode('https://www.',$url);
// var_dump($item);
// exit;
// exit;
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

 
// $this->title = $name;
?>
<!-- <div class="site-error"style="margin-top:-88px!important;">
<a type="button" class="btn btn-link" style="right:200px;">ارتباط با ما</a> 
<a type="button" class="btn btn-link" style="margin-right:100px;">پنل کاربری</a> 
<a type="button" class="btn btn-link" style="margin-right:100px;">صفحه اصلی</a> 
<img src="/img/404.jpg" style="width:100%;" >
    

</div> -->




















<?php 
// echo "say hellloooooooooooooooooo";
// Yii::$app->mailer->compose()

// ->setTo('bcc@bccstyle.com')

// ->setFrom('info@bccstyle.com')

// ->setSubject('Invite')

// ->setTextBody('Hello!')

// ->send();

// var_dump(Yii::$app->mailer->compose()

// ->setTo('bcc@bccstyle.com')

// ->setFrom('info@bccstyle.com')

// ->setSubject('Invite') 

// ->send());
// Yii::$app->mailer->compose()

// ->setTo('bcc@bccstyle.com')

// ->setFrom('rezvan.tayefe.66@gmail.com')

// ->setSubject('Invite') 

// ->send();

// \Yii::$app->mailer->compose()
// ->setFrom('info@bccstyle.com')
// ->setTo('rezvan.tayefe.66@gmail.com')
// ->setSubject('به      بی سی سی خوش آمدید   ')
// ->setTextBody('Hello!')
//  ->send(); 


// \Yii::$app->mailer->compose()
// ->setFrom('info@bccstyle.com')
// ->setTo('rezvan.tayefe.66@gmail.com')
// ->setSubject('به      بی سی سی خوش آمدید   ')
// ->setTextBody('Hello!')
//  ->send(); 
   
//  var_dump(
//     \Yii::$app->mailer->compose()
//     ->setFrom('info@bccstyle.com')
//     ->setTo('rezvan.tayefe.66@gmail.com')
//     ->setSubject('به      بی سی سی خوش آمدید   ')
//     ->setTextBody('Hello!')
//      ->send()
//  );exit;
?>
