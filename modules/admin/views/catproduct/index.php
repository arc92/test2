<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatproductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'دسته بندی';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catproduct-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('افزودن دسته بندی محصول', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id',
            'name',
            'urltitle',
            'title',
            'description',
            [
                'attribute'=>'staus',
                'filter'=>['0'=>'غیر فعال','1'=>'فعال'],
                'value'=>function($model){
                    if ($model->staus==1){
                        return ' فعال';
                    }elseif ($model->staus==0){
                        return ' غیر فعال';
                    } 
                }
            ],
            //'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
