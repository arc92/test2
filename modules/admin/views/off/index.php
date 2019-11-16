<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'تخفیف کلی';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="off-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        Html::a('افزودن تخفیف کلی', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'percent',
        //    'status',
            [
                'attribute'=>'status',
                'filter'=>['0'=>'غیر فعال','1'=>'فعال'],
                'value'=>function($model){
                if($model->status==1)
                    return 'فعال';
                    return 'غیر فعال';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
