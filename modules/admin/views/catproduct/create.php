<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Catproduct */

$this->title = 'افزودن';
$this->params['breadcrumbs'][] = ['label' => 'Catproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catproduct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
    ]) ?>

</div>
