<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Menu2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'منوساز';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu2-index">

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
            'name',
            //'parent',
           // 'has_submenu',
           // 'row',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
