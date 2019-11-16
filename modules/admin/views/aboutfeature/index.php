<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AboutfeatureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aboutfeatures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutfeature-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Aboutfeature', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'aboutID',
            'titr',
            'about:ntext',
            'years',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
