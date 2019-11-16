<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Catproduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'urltitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($upload, 'imageFile')->fileInput()->label('تصویر') ?>

    <?= $form->field($model, 'staus')->dropDownList([
            '1'=>'فعال',
            '0'=>'غیر فعال',
        ])->label('وضعیت') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
