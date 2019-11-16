<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Letme */

$this->title = 'Update Letme: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Letmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="letme-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
