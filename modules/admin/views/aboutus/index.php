<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AboutusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'درباره ما';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutus-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('افزودن درباره ما', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'titr',
            'text:ntext',
            'title',
            'description',
           // 'submitDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
