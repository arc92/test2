<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'status')->dropDownList(['1'=>'فعال','0'=>'غیر فعال','2'=>'اسلایدر صفحه category']) ?> 

  
    
    <?= $form->field($model, 'hour')->dropDownList([
        '1'=>'1',
        '2'=>'2',
        '3'=>'3',
        '4'=>'4',
        '5'=>'5',
        '6'=>'6',
        '7'=>'7',
        '8'=>'8',
        '9'=>'9',
        '10'=>'10',
        '11'=>'11',
        '12'=>'12',
        '13'=>'13',
        '14'=>'14',
        '15'=>'15',
        '16'=>'16',
        '17'=>'17',
        '18'=>'18',
        '19'=>'19',
        '20'=>'20',
        '21'=>'21',
        '22'=>'22',
        '23'=>'23',
        '24'=>'24',
    ]) ?>
  <?= $form->field($model, 'create_date')->widget(jDate\DatePicker::className()) ?>
     <?=$form->field($upload, 'imageFile')->fileInput()->label('تصویر') ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
