<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ColorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'رنگ ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="color-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('افزودن رنگ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            //'name', 
            [
                'attribute'=>'name',
                'format'=>'raw',
                'value'=>function($model){
                    return (isset($model->name) && $model->name!='')?"<div style='width:50px;height:50px;border-radius:50px;background-color:".$model->name."'></div>":"رنگی وجود ندارد";

                }
            ],
           'value',
         //   'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
