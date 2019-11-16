<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper; 
use yii\helpers\Url;
use dixonstarter\pdfprint\Pdfprint; 
// date_default_timezone_set("Asia/tehran");
// echo date("Y/m/d H:i:s");exit;
// ini_set('date.timezone', 'Asia/tehran'); 
// var_dump(Yii::$app->jdate->date(' H:i:s ـــ Y/m/d' ));exit;
// date_default_timezone_set('Asia/Tehran');
// $timestamp = time();
// $date_time = date("d-m-Y (D) H:i:s", $timestamp);
// echo  $date_time;exit;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BascketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'سفارشات';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bascket-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= \dixonstarter\pdfprint\Pdfprint::widget([
  'elementClass' => '.btn-pdfprint'
]);?> 
 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'], 

          //  'id',
           // 'cartID',
           // 'recived',
            'name',
            'family',
           // 'stateID',
            [
                'attribute'=>'stateID',
                'filter'=> ArrayHelper::map(\app\models\Province::find()->all(), 'id','name'),
                'value'=>function($model){
                    if($model->stateID!=null || $model->stateID!=0){  
                    return $model->state->name;
                    }
                }
            ],
          
            [
               
                'attribute'=>'cityID',
                'filter'=> ArrayHelper::map(\app\models\City::find()->all(), 'id','name'),
                'value'=>function($model){ 
                    if($model->cityID!=null || $model->cityID!=0){  
                    return $model->city->name; 
                    }
            }
            ],
            
        
           //'cityID',
            // 'address:ntext',
            //'tel',
            //'mobile',
            //'day',
            //'timeID:datetime',
            //'description:ntext',
            //'discount',
            //'memeber',
            //'authority',
             'refID',
            //'count',
            'amount',
            //'status',

            [
                'label'=>'وضعیت پرداخت',
                'attribute'=>'status',
                'filter'=>['0'=> 'پرداخت نشده','1'=>'پرداخت شده','2'=>'پرداخت در محل'],
                'value'=>function($model){
                    if ($model->status==1){
                        return 'پرداخت شده';
                    }elseif ($model->status==0){
                        return 'پرداخت نشده';
                    }elseif ($model->status==2){
                        return 'پرداخت در محل';
                    }
                }
            ],
            'submitDate', 
         // use in ActionColumn
  
         [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'عملیات',
            'options'=>['style'=>'width:150px;'],
            'buttonOptions'=>['class'=>'btn btn-default'],
            'template'=> '<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>',
            'buttons'=>[
              'print'=>function($url,$model){
                return Html::a('<i class="glyphicon glyphicon-print"></i>',['bascket/view?id='.$model->id],['class'=>'btn-pdfprint btn btn-default','data-pjax'=>'0']);
              }
            ]
          ],
        
        ],
    ]); ?> 
    
