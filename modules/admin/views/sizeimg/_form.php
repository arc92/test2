<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sizeimg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sizeimg-form">

    <?php $form = ActiveForm::begin(); ?>
   
  <!-- $form->field($model, 'text')->textarea(['rows' => 6]) ?>  -->
    <?= $form->field($upload, 'imageFile')->fileInput()->label('تصویر') ?> 
    
   
    <!-- <input type="checkbox" id="hasImage" value=""> -->
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

 
<?php
$script = <<< JS

// var upload=jQuery('.field-uploads-imagefile');
// upload.remove();
// jQuery('#hasImage').change(()=>{
// console.log(1);
// jQuery('.field-uploads-imagefile').remove();
// if ($('#hasImage').is(':checked')) {
//         var html= '<div class="form-group field-uploads-imagefile">';
//         html+='<label class="control-label" for="uploads-imagefile">تصویر</label>';
//         html+='<input type="hidden" name="Uploads[imageFile]" value=""><input type="file" id="uploads-imagefile" name="Uploads[imageFile]">';

//         html+='<div class="help-block"></div>';
//         html+='</div>';
//         jQuery('#hasImage').after(html);
//  }else{
//      upload.remove();
//  }
// }); 
 
JS;
$this->registerJs($script);
?>