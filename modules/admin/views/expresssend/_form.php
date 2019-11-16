<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Expresssend */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expresssend-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'send')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
