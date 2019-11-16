<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'افزودن محصول';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'multiupload'=>$multiupload, 
        'featurevaluemodel'=>$featurevaluemodel,
        'detailsvaluemodel'=>$detailsvaluemodel,
        'aboutproductmodel'=>$aboutproductmodel,
    ]) ?>

</div>
