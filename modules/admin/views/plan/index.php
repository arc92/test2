<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'طرح ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('افزودن طرح', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
            'img',
            'create_date',
            [
                'label'=>'وضعیت انتشار',
                'attribute'=>'status',
                'value'=>function($model){
                    if ($model->status==1){
                        return ' فعال';
                    }elseif ($model->status==0){
                        return ' غیر فعال';
                    } 
                }
            ],

            ['class' => 'yii\grid\ActionColumn','template'=>'{create}{view}{update}'],
        ],
    ]); ?>
</div>
