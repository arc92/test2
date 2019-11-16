<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContactusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contactus-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sitename') ?>

    <?= $form->field($model, 'about') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'submitDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
