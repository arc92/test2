<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogvideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ویدیو ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogvideo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('افزودن ویدئو', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'blogID',
            'video',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
