<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aboutproduct */

$this->title = 'افزودن مشخصات محصول';
$this->params['breadcrumbs'][] = ['label' => 'Aboutproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutproduct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
