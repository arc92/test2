<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Icon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="icon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($upload, 'imageFile')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropdownList([
        '1'=>'فعال',
        '0'=>'غیر فعال',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
