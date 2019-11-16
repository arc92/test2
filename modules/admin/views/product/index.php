<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'محصولات';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('افزودن محصول', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
            //'catID',
            // [
            //     'attribute'=>'catID',
            //     'filter'=> ArrayHelper::map(\app\models\Category::find()->all(), 'id','name'),
            //     'value'=>function($model){
            //         return $model->cat->name;
            //     }
            // ],
            // [
            //     'attribute'=>'subcatID',
            //     'filter'=> ArrayHelper::map(\app\models\Subcat::find()->all(), 'id','name'),
            //     'value'=>function($model){
            //         return $model->subcat->name;
            //     }
            // ],
          
          //  'subcatID',
          //  'planID',
            [
                'attribute'=>'planID',
                'filter'=> ArrayHelper::map(\app\models\Plan::find()->orderBy(['id'=>SORT_DESC])->all(), 'id','name'),
                'value'=>function($model){
                    return $model->plan->name;
                }
            ],
            //'storePrice',
            //'price',
            //'count',
            //'description:ntext',
           //'likes',
           [
            'attribute'=>'likes',
            'value'=>function($model){
                if($model->likes==0){
                    return 0;
                }else{
                return $model->likes;
                }
            }
        ],
            //'submitDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
