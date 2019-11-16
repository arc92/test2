<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Setbabycat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setbabycat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($upload, 'imgFile')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'status')->dropdownlist([
        '1'=>'فعال',
        '0'=>'غیر فعال'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
