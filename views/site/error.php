<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error"style="margin-top:-88px!important;">
<a href="/contactus/" type="button" class="btn btn-link" style="right:200px;">ارتباط با ما</a> 
<a href="/user" type="button" class="btn btn-link" style="margin-right:300px;">پنل کاربری</a> 
<a href="/" type="button" class="btn btn-link" style="margin-right:100px;">صفحه اصلی</a> 
<img src="/img/404.jpg" style="width:100%;" >
    

</div>
<!-- <div class="site-error">
<img src="/img/404.jpeg" style="width:100%;margin-top:-180px;" >
    <h1><   Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
           nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div> -->
