<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MysizeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mysize-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'age') ?>

    <?= $form->field($model, 'height') ?>

    <?= $form->field($model, 'weight') ?>

    <?= $form->field($model, 'waist') ?>

    <?php // echo $form->field($model, 'hip') ?>

    <?php // echo $form->field($model, 'round') ?>

    <?php // echo $form->field($model, 'arm') ?>

    <?php // echo $form->field($model, 'wrist') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
