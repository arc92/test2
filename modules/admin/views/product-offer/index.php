<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductOfferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'تخفیف محصول';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-offer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('افزودن کد تخفیف محصول', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'percent',
            'expire_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
