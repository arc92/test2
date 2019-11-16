<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LetmeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'لیست به من اطلاع بده';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="letme-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'productID',
            [
                'attribute'=>'productID',
                'format'=>'raw',
                'value'=>function($model){
                    foreach(\app\models\Product::find()->Where(['id'=>$model->productID])->all() as $p){ 
                    return $p->name;
                    }
                }
            ],
            [
                'attribute'=>'size',
                'format'=>'raw',
                'value'=>function($model){
                    foreach(\app\models\Featurevalue::find()->Where(['id'=>$model->size])->all() as $p){ 
                    return $p->value;
                    }
                }
            ],
           // 'size',
            'mobile',
            'submitDate',
            [
                'attribute'=>'status',
                'filter'=>['0'=>'ارسال نشده','1'=>'ارسال شد'],
                'format'=>'raw',
                'value'=>function($model){
                    if($model->status==1){
                        return 'ارسال شد';
                    }else{
                    return 'ارسال نشده';
                    }
                }
            ],

            
        ],
    ]); ?>
</div>
