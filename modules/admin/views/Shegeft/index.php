<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShegeftSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'شکفت انگیزان';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shegeft-index">

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
          //  'productID',
            [
                'attribute'=>'productID',
                'filter'=> ArrayHelper::map(\app\models\Product::find()->all(), 'id','name'),
                'value'=>function($model){
                    return $model->product->name;
                }
            ],
            'off',
            'date',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
