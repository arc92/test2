<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MysizeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'سایز البسه من';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mysize-index">

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
            'age',
            'height',
            'weight',
            'waist',
            //'hip',
            //'round',
            //'arm',
            //'wrist',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
