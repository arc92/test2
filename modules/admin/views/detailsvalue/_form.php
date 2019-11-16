<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Detailsvalue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detailsvalue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'detailsID')->textInput() ?>

    <?= $form->field($model, 'productID')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
