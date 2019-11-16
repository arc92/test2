<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OfferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'تخفیف';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-index">

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
           // 'planID',
        
            [
                'attribute'=>'planID',
                'filter'=> ArrayHelper::map(\app\models\Plan::find()->all(), 'id','name'),
                'value'=>function($model){  
                    return $model->plan->name; 
                    } 
            ],
            'start_date',
            'end_date',
            'percent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
