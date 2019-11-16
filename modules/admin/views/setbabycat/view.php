<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Setbabycat */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Setbabycats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setbabycat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         //   'id',
            'img',
            'name',
           // 'status',
        ],
    ]) ?>

</div>
