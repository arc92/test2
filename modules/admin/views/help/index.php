<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HelpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'راهنما';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="help-index">

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
            'cathelpID',
            'titr',
            'text:ntext',
            'submitDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
