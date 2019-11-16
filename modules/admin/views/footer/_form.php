<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Footer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="footer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($upload, 'imageFile')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
