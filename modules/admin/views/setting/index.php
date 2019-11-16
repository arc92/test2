<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'تنظیمات';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-index">

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

            //'id',
            'sitename',
          //  'logo',
            'about:ntext',
            //'footerlogo',
            //'title',
            //'description',
            //'title_contactus',
            //'description_contactus',
            //'title_aboutus',
            //'description_aboutus',
            //'title_faq',
            //'description_faq',
            //'title_transport',
            //'description_transport',
            //'title_size',
            //'description_size',
            //'title_blog',
            //'description_blog',
            //'title_blogsingle',
            //'description_blogsingle',
            //'title_branches',
            //'description_branches',
            //'title_certificates',
            //'description_certificates',
            //'title_privacy',
            //'description_privacy',
            //'title_help',
            //'description_help',
            //'title_cart',
            //'description_cart',
            //'title_endstep',
            //'description_endstep',
            //'title_collection',
            //'description_collection',
            //'title_collection_inside',
            //'description_collection_inside',
            //'title_product',
            //'description_product',
            //'title_product_index',
            //'description_product_index',
            //'title_girlgrid',
            //'description_girlgrid',
            //'title_boygrid',
            //'description_boygrid',
            //'title_girlbaby',
            //'description_girlbaby',
            //'title_boybaby',
            //'description_boybaby',
            //'title_child',
            //'description_child',
            //'title_baby',
            //'description_baby',
            //'title_menulink',
            //'description_menulink',
            //'title_product_index2',
            //'description_product_index2',
            //'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
