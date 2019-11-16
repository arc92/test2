<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetailsvalueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' مقدار ویژگی ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailsvalue-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('افزودن مقدار وِیژگی ها', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'detailsID',
            [
                'attribute'=>'detailsID',
                'filter'=> ArrayHelper::map(\app\models\Details::find()->all(), 'id','value'),
                'value'=>function($model){
                    return $model->details->value;
                }
            ],
            [
                'attribute'=>'productID',
                'filter'=> ArrayHelper::map(\app\models\Product::find()->all(), 'id','name'),
                'value'=>function($model){
                    return $model->product->name;
                }
            ],
            //'productID',
            'title',
            'value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
