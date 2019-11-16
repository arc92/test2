<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
use dominus77\tinymce\assets\FontAwesomeAsset;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Bascket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bascket-form">

    <?php $form = ActiveForm::begin();?>
<!-- //     if($model->status==0){ 
//  <div class="form-group">
//         <h1>سفارش نا موفق</h1>
//     </div>
//     ?php }else{  -->

    <?= $form->field($model, 'condition')->dropDownList([
        '1'=>'در حال بررسی',
        '2'=>'تایید سفارش',
        '3'=>'ارسال شده',
        '4'=>'وضعیت نهایی',
    ]) ?>

    <?= $form->field($model, 'commentadmin')->widget(\dominus77\tinymce\TinyMce::className(), [    
    'options' => [
        'rows' => 6,
        'placeholder' => true,
    ], 
    'language' => 'fa',
    'clientOptions' => [
        'menubar' => true,
        'statusbar' => true,        
        'theme' => 'modern',
        'skin' => 'lightgray-gradient', //charcoal, tundora, lightgray-gradient, lightgray
        'plugins' => [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak placeholder",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern imagetools codesample toc noneditable",
        ],
        'noneditable_noneditable_class' => 'fa',
        'extended_valid_elements' => 'span[class|style]',
        'toolbar1' => "undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        'toolbar2' => "print preview media | forecolor backcolor emoticons | codesample",
        'image_advtab' => true,
        'templates' => [
            [
                'title' => 'Test template 1',
                'content' => 'Test 1',
            ],
            [
                'title' => 'Test template 2',
                'content' => 'Test 2',
            ]
        ],
        'content_css' => [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css',            
        ]
    ]
]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
       
    <?php ActiveForm::end(); ?>

</div>
