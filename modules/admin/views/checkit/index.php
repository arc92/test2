<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CheckitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'نظرات کاربران';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <!-- Html::a('Create Checkit', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id',
            //'productID',
            [
                'attribute'=>'productID',
                'filter'=> ArrayHelper::map(\app\models\Product::find()->all(), 'id','name'),
                'value'=>function($model){
                    return $model->product->name;
                }
            ],
            'name',
            'userEmail:email',
            'usercheck:ntext',
            'rate',
            //'status',
            //'submitDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
