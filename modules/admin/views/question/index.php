<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'سوالات کاربران';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
   <!-- Html::a('Create Question', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
            'email:email',
            'mobile',
            'question:ntext',
          //  'file',
            [
                'attribute'=>'file',
                'format'=>'raw',
                'value'=>function($model){ 
                        return '<a href="/download/'.$model->id.'/ " target="_blank" >'.$model->file.'</a>';
                        }
            ],
          //  'status',
           
            //'submitDate',

            ['class' => 'yii\grid\ActionColumn','template'=>'{create}{view}{delete}'],
        ],
    ]); ?>
</div>
