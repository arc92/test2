<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sitename',
            'logo',
            'about:ntext',
            'footerlogo',
            'title',
            'description',
            'title_contactus',
            'description_contactus',
            'title_aboutus',
            'description_aboutus',
            'title_faq',
            'description_faq',
            'title_transport',
            'description_transport',
            'title_size',
            'description_size',
            'title_blog',
            'description_blog',
            'title_blogsingle',
            'description_blogsingle',
            'title_branches',
            'description_branches',
            'title_certificates',
            'description_certificates',
            'title_privacy',
            'description_privacy',
            'title_help',
            'description_help',
            'title_cart',
            'description_cart',
            'title_endstep',
            'description_endstep',
            'title_collection',
            'description_collection',
            'title_collection_inside',
            'description_collection_inside',
            'title_product',
            'description_product',
            'title_product_index',
            'description_product_index',
            'title_girlgrid',
            'description_girlgrid',
            'title_boygrid',
            'description_boygrid',
            'title_girlbaby',
            'description_girlbaby',
            'title_boybaby',
            'description_boybaby',
            'title_child',
            'description_child',
            'title_baby',
            'description_baby',
            'title_menulink',
            'description_menulink',
            'title_product_index2',
            'description_product_index2',
            'create_date',
        ],
    ]) ?>

</div>
