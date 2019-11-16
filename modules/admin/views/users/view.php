<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

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
          //  'id',
            'fullName',
           // 'password',
            'email:email',
           // 'has_mobile',
            'mobile',
            'tell',
            'day',
            'mounth',
            'year',
         //   'img',
            [
                'attribute'=>'img',
                'format' => 'raw',
                'value'=>function($model){
                    if($model->img!=null)
                   return "<img src='/uploads/$model->img' width='100'  height='100' ";
                   return '';
                }
            ],
            //'role',
            //'status',
            'submitDate',
           // 'active',
            [
                'attribute'=>'active',
                'value'=>function($model){
                    if ($model->active==1){
                        return ' فعال';
                    }elseif ($model->active==0){
                        return ' غیر فعال';
                    } 
                }
            ],
        ],
    ]) ?>

</div>
