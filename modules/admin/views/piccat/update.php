<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Piccat */

$this->title = 'ویرایش: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Piccats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="piccat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
        'uploads' => $uploads,
    ]) ?>

</div>
