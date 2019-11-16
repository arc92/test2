<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aboutimg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aboutimg-form">

    <?php $form = ActiveForm::begin(); ?>

    

      <?= $form->field($upload, 'imageFile')->fileInput()->label('تصویر') ?>
      <?= $form->field($model, 'submitDate')->hiddenInput(['value'=>time()])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
