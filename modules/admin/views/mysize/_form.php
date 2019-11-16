<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mysize */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mysize-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'waist')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'round')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wrist')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
