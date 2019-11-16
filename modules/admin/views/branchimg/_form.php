<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Branchimg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branchimg-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($upload, 'imageFile')->fileInput()->label('تصویر') ?>
     <?= $form->field($model, 'status')->hiddenInput(['value' => 0])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
