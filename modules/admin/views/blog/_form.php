<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
use dominus77\tinymce\assets\FontAwesomeAsset;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'catID')->dropDownList(
      ArrayHelper::map(\app\models\Blogcat::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?> 
    
    <?= $form->field($model, 'text')->widget(\dominus77\tinymce\TinyMce::className(), [    
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


 <?= $form->field($multiupload, 'imageFile')->fileInput(['accept'=>'image/*'])->label('تصویر') ?>

 <?= $form->field($model, 'aboutimg')->textInput( )->label('متن زیر عکس') ?>

 <?php if($model->isNewRecord || $tagmodel==false){?>
 <?= $form->field($model, 'tags[]')->widget(Select2::classname(), [
    'data' => [],
    'options' => [  'multiple' => true],
    'pluginOptions' => [
        'tags' => true,
        'tokenSeparators' => [',', ' '],
        // 'maximumInputLength' => 10
    ],
])->label('برچسب');?>
<?php }elseif($model->isNewRecord==false || $tagmodel){ ?>
    <div class="form-group field-blog-tags">
<label class="control-label" for="blog-tags">برچسب</label>
 <select id="tags" class="form-control " name="tags[]" multiple="multiple" tags='tags' data-krajee-select2="select2_5e1788cd">
 <?php 
foreach($tagmodel as $_tag){ 
    $tagmodelitem[$_tag->blogID]=$_tag->blogID;  
    ?>  
  <option value="<?=$_tag->name?>"   <?=(isset($tagmodelitem[$model->id]))?' selected="selected"':''?> ><?=$_tag->name?></option> 
<?php } ?>
</select>
</div>
<?php } ?>

 <?= $form->field($model, 'status')->dropDownList(['1'=>'انتشار','0'=>'بایگانی']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script=<<<JS
 
  $("#tags").select2(); 

  $("#tags").select2({
  tags: true
});
JS;
$this->registerJs($script);
?>  