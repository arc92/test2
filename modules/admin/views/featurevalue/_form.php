<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Featurevalue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="featurevalue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'featureID')->textInput() ?>

    <?= $form->field($model, 'productID')->textInput() ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
