<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Submenu2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="submenu2-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'parentID')->dropDownList(
      ArrayHelper::map(\app\models\Menu::find()->Where(['!=','parent',0])->all(), 'id', 'name'))->label('عنوان زیر منو اصلی') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($upload, 'imageFile')->fileInput()->label('تصویر') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
