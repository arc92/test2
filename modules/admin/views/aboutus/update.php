<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aboutus */

$this->title = 'ویرایش: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aboutuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aboutus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'multiupload'=>$multiupload,
    ]) ?>

</div>
