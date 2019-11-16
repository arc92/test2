<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PiccatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'تصاویر نوزاد دختر و پسر ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="piccat-index">

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
            'imgone',
            'imgtow',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
