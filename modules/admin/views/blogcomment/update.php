<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blogcomment */

$this->title = 'Update Blogcomment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Blogcomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blogcomment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
