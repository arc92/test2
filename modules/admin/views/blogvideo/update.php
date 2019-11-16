<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blogvideo */

$this->title = 'ویرایش: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Blogvideos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blogvideo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'video'=>$video,
    ]) ?>

</div>
