<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sizeimg */

$this->title = 'افزودن تصویر راهنمای سایز';
$this->params['breadcrumbs'][] = ['label' => 'Sizeimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sizeimg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
    ]) ?>

</div>
