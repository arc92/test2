<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Featurevalue */

$this->title = 'ویرایش مقدار ویژگی : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Featurevalues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="featurevalue-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
