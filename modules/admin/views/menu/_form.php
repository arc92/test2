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

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_submenu')->dropDownList([
        '1'=>'دارد',
        '0'=>'ندارد',
        '2'=>'منو بی سی سی',
        ])->label('زیر منو') ?> 


    <?php if($model->isNewRecord){ ?> 
     <?= $form->field($model, 'parent',['options'=>['style'=>'display:none;','id'=>'parent']])->dropDownList(ArrayHelper::map(\app\models\Menu::find()->Where(['has_submenu'=>1])->all(),'id','name'),['prompt'=>'انتخاب کنید','value'=>0])->label('انتخاب منو اصلی') ?>
     <?php }else{ 
         if($model->has_submenu){?> 
     <?= $form->field($model, 'parent',['options'=>['style'=>'display:none;','id'=>'parent']])->dropDownList(ArrayHelper::map(\app\models\Menu::find()->Where(['has_submenu'=>1])->all(),'id','name'),['prompt'=>'انتخاب کنید','value'=>0])->label('انتخاب منو اصلی') ?>
         <?php }else{ ?>
     <?= $form->field($model, 'parent')->dropDownList(ArrayHelper::map(\app\models\Menu::find()->Where(['has_submenu'=>1])->all(),'id','name'))->label('انتخاب منو اصلی') ?>
     <?php } } ?>
     
     <!-- $form->field($model, 'link')->widget(Select2::classname(), [
    'data' =>ArrayHelper::map(\app\models\Product::find()->Where(['status'=>1])->all(),'id','name'),
    'language' => 'e',
    'options' => ['placeholder' => 'لطفا یک محصول انتخاب کنید..'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);  -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS

jQuery('#menu-has_submenu').change(()=>{ 

        if(jQuery('#menu-has_submenu').val()==0){    
            $('#parent').show();   
      }else{   
        $('#parent').hide();     
        $('#parent').val('0');     
      }
     
    });     
 
  
JS;
$this->registerJs($script);
?>
