<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'مدیریت ارسال';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="send-index">

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

          //  'id',
            'date',
            'time1',
            'time2',
            'count1',
            'count2',
          //  'status',
            [
                'attribute'=>'status',
                'filter'=>['1'=>'فعال','0'=>'غیر فعال'],
                'format'=>'raw',
                'value'=>function($model){
                    if($model->status==1){
                        return 'فعال';
                    }else{
                        return 'غیر فعال';
                    }
                   
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
