<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'اسلایدر';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

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

            //'id',
            'title',
            'img',
            //'status',
            [
                'attribute'=>'status',
                'filter'=>array("1"=>"فعال","0"=>"غیر فعال",'2'=>'اسلایدر صفحه category'),
                'value'=>function($model){
                    if($model->status==0){
                        return 'غیر فعال';
                    }elseif($model->status==1){
                        return ' فعال';
                    }elseif($model->status==2){
                        return 'اسلایدر صفحه category';
                    }
                }
            ],
            'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
