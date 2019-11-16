<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tagblog */

$this->title = 'ویرایش: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tagblogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tagblog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
