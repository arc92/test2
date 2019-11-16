<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'parent')->dropDownList(
      ArrayHelper::map(\app\models\Menu::find()->Where(['has_submenu'=>1])->all(), 'id', 'name'))->label('منو اصلی') ?>
      
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
