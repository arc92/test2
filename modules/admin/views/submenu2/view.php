<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Submenu2 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Submenu2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="submenu2-view">

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
            'id',
            'parentID',
            'name',
            'img',
            'create_date',
        ],
    ]) ?>

</div>
