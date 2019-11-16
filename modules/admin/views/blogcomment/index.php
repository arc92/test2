<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogcommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'نظرات وبلاگ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogcomment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <!-- Html::a('مشاهده', ['update'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'blogID',
            [
                    'attribute'=>'blogID',
                    'filter'=> ArrayHelper::map(\app\models\Blog::find()->all(), 'id','name'),
                    'value'=>function($model){
                        return $model->blog->name;
                    }
                ],
            'userID',
            'fullname',
            'email:email',
            //'text:ntext',
            //'status',
            //'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
