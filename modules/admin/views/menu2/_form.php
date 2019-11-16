<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Menu2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
   

   
    <?= $form->field($model, 'parent')->dropDownList(ArrayHelper::map(\app\models\Menu2::find()->Where(['has_submenu'=>1])->all(),'id','name'),['prompt'=>'انتخاب کنید'])->label('انتخاب منو اصلی') ?>

     
    <?= $form->field($model, 'has_submenu')->dropDownList([
        '1'=>'دارد',
        '0'=>'ندارد', 
        ])->label('زیر منو') ?> 
        
         <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'row')->dropDownList([
        '0'=>'منو اصلی',
        '1'=>'ردیف 1',
        '2'=>'ردیف 2',
        '3'=>'ردیف 3', 
        ])->label('ردیف') ?> 
         <?= $form->field($upload, 'imageFile')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
