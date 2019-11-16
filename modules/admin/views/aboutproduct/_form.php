<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aboutproduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aboutproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productID')->textInput() ?>

    <?= $form->field($model, 'details')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
