<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Icon */

$this->title = 'ویرایش: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Icons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="icon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload'=>$upload,
    ]) ?>

</div>
