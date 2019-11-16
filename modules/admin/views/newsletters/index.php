<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewslettersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'خبرنامه';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletters-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'field',
            'submitDate',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
