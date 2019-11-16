<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'منوها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('افزودن منو', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            //'parent',
            // [
            //  'attribute'=>'parent',
            //  'filter'=> ArrayHelper::map(\app\models\Menu::find()->all(), 'id','name'),
            //  'value' =>function($model){
            //      if($model->parent==0 || $model->parent==null){
            //          echo 'منو صلی';
            //      }else{
            //          echo 'زیر منو';
            //      }
            //     }
            // ],
            //'has_submenu',
           // 'link',
            //'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
