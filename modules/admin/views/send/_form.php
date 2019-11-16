<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Send */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="send-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'time1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count1')->textInput() ?>

    <?= $form->field($model, 'count2')->textInput() ?>

    <?= $form->field($model, 'date')->widget(jDate\DatePicker::className()) ?>

    <?= $form->field($model, 'status')->dropdownlist([
        '1'=>'فعال',
        '0'=>'غیر فعال'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
