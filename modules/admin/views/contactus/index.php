<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'تماس با ما';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactus-index">

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
            'about:ntext',
            'title',
            'description',
           // 'address:ntext',
           // 'tel',
            //'email:email',
            //'submitDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
