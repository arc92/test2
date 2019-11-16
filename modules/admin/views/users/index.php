<?php 
use yii\helpers\Html;   
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url; 
use kartik\export\ExportMenu; 
//use yii\grid\GridView; 
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'کاربران';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
         <?= Html::a('افزودن کاربر', ['create'], ['class' => 'btn btn-success']) ?> 
    </p>
    <?php
    // Modal::begin([
    //     'header'=>'<h4>کاربران</h4>',
    //     'id'=>'modal',
    //     'size'=>'modal-lg',
    // ]);
    //     echo '<div id="modalContent"></div>';
    ?>
 
<?php 
 $gridColumns=[  
   // ['class' => 'yii\grid\SerialColumn'],
     'fullName', 
     'email', 
     'mobile',
    // ['class' => 'yii\grid\ActionColumn'],
    ];
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'exportConfig' => [
        //ExportMenu::FORMAT_TEXT => false,
        ExportMenu::FORMAT_PDF => false
    ],
    
]);   

// echo \kartik\grid\GridView::widget([
//     'dataProvider' => $dataProvider,
//     'filterModel' => $searchModel,
//     'columns' => $gridColumns
// ]);
// echo \kartik\grid\GridView::widget([
//     'dataProvider' => $dataProvider,
//     'filterModel' => $searchModel,
//     'columns' => $gridColumns
// ]);
?>  

<?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'columns' => [
            
    //['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'fullName',
           // 'password',
     'email:email',
            //'has_mobile',
           'mobile',
          //  'tell',
           // 'day',
           // 'mounth',
           // 'year',
            //'img',
           //  'role',
           
            [
                'attribute'=>'active',
                'filter'=>['0'=>'غیر فعال', '1'=>'فعال'],
                'value'=>function($model){
                    if ($model->active==1){
                        return ' فعال';
                    }elseif ($model->active==0){
                        return ' غیر فعال';
                    } 
                }
            ],
            //'status',
        
            //'submitDate',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);  ?>  
</div>
