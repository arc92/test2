<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Piccat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="piccat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($upload, 'imgFile')->fileInput(['maxlength' => true])->label('تصویر نوزاد دختر') ?>

    <?= $form->field($uploads, 'imageFile')->fileInput(['maxlength' => true])->label('تصویر نوزاد پسر') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
