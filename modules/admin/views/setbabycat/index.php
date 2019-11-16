<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SetbabycatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ست نوزادی';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setbabycat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('افزودن', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'img',
            'name',
          //  'status',
            [
                'label'=>'وضعیت',
                'attribute'=>'status',
                'filter'=>['0'=>'غیر فعال','1'=>'فعال'],
                'value'=>function($model){
                    if($model->status==1){
                        return 'فعال';
                    }elseif($model->status==0){
                        return 'غیر فعال';
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
