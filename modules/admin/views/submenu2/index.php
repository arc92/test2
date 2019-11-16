<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Submenu2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'زیر منو ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="submenu2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('افزودن زیر منو', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'parentID',
            [
                'attribute'=>'parentID',
                'filter'=> ArrayHelper::map(\app\models\Menu::find()->Where(['!=','parent', 0])->all(), 'id','name'),
                'value'=>function($model){
                    return $model->name;
                }
            ],
            'name',
            'img',
            'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
