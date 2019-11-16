<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Timesend */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timesend-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'time1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'countSend')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
