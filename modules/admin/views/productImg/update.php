<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductImg */

$this->title = 'ویرایش تصویر محصول: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Imgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-img-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
