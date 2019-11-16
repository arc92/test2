<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
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
          //  'id',
            'name',
           // 'catID',
            // [                      // the owner name of the model
            //     'label' => 'دسته بندی',
            //     'value' => $model->cat->name,
            // ],
            // [                      // the owner name of the model
            //     'label' => 'زیر دسته بندی ',
            //     'value' => $model->subcat->name,
            // ],
             
           // 'subcatID',
           // 'planID',
            [                      // the owner name of the model
                'label' => 'طرح ',
                'value' => $model->plan->name,
            ],
            'storePrice',
            'price',
            'count',
            'description:ntext',
            //'likes',
            'submitDate',
        ],
    ]) ?>

</div>
