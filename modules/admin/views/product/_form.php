<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
use dominus77\tinymce\assets\FontAwesomeAsset;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */


//foreach ($productCategory as $a){
//    /* @var $a app\models\Product */
//    /* @var $t app\models\Catproduct */
//    $t = $a->catproducts;
//    var_dump($t[1]->id);die();
//}
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?php if ($model->isNewRecord == false && ($productCategory)) { ?>
        <?php
        foreach ($productCategory as $product) {
            foreach ($product->catproducts as $catproduct) {
                $categoryProduct[$catproduct->id] = $catproduct->id;
            }
        }
        ?>

        <div class="form-group field-product-cat_relation">
            <label class="control-label" for="product_category">دسته بندی اصلی</label>
            <select id="product_category" class="form-control " name="product_category_relation[]" multiple="multiple"
                    krajee-select2="select2_da38a72a">
                <?php
                foreach (\app\models\Catproduct::find()->all() as $cat_product) {
                    ?>
                    <option value="<?= $cat_product->id ?>" <?= (isset($categoryProduct[$cat_product->id])) ? ' selected="selected"' : '' ?> ><?= $cat_product->name ?></option>
                <?php } ?>
            </select>
        </div>
    <?php } else { ?>
        <div class="form-group field-product-cat_relation">
            <label class="control-label" for="product_category">دسته بندی اصلی</label>
            <select id="product_category" class="form-control " name="product_category_relation[]" multiple="multiple"
                    krajee-select2="select2_da38a72a">
                <?php
                foreach (\app\models\Catproduct::find()->all() as $cat_product) {
                    ?>
                    <option value="<?= $cat_product->id ?>" <?= (isset($categoryProduct[$cat_product->id])) ? ' selected="selected"' : '' ?> ><?= $cat_product->name ?></option>
                <?php } ?>
            </select>
        </div>
    <?php } ?>
    <!--    --><?//= $form->field($model, 'catproducts')->dropDownList(ArrayHelper::map(\app\models\Catproduct::find()->Where(['staus' => 1])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'titlemeta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descriptionmeta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'محصولات',
        '2' => 'سایر'
    ]) ?>

    <?php if ($model->isNewRecord == false && ($categoryrelationmodel)) { ?>
        <div class="form-group field-product-cat_relation">
            <label class="control-label" for="product-cat_relation1">دسته بندی</label>
            <select id="product-cat_relation1" class="form-control " name="cat_relation[]" multiple="multiple"
                    krajee-select2="select2_da38a72a">
                <?php
                foreach ($categoryrelationmodel as $_type) {
                    $categoryrelationitem[$_type->catID] = $_type->catID;
                }
                foreach (\app\models\Category::find()->all() as $_category) {
                    ?>
                    <option value="<?= $_category->id ?>" <?= (isset($categoryrelationitem[$_category->id])) ? ' selected="selected"' : '' ?> ><?= $_category->name ?></option>
                <?php } ?>
            </select>
        </div>
    <?php } else { ?>
        <?= $form->field($model, 'cat_relation[]')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'),
            'options' => ['multiple' => true, 'placeholder' => '']
        ])->label('دسته بندی'); ?>
    <?php } ?>

    <?php if ($model->isNewRecord == false && ($subcatrelationemodel)) { ?>
        <div class="form-group field-product-subcat_relation">
            <label class="control-label" for="product-subcat_relation1">جنسیت</label>
            <select id="product-subcat_relation1" class="form-control  " name="subcat_relation[]" multiple="multiple"
                    krajee-select2="select2_da38a72a">
                <?php
                foreach ($subcatrelationemodel as $_sub) {
                    $subcatrelationemodelitem[$_sub->subcatID] = $_sub->subcatID;
                }
                foreach (\app\models\Subcat::find()->all() as $_subcat) { ?>
                    <option value="<?= $_subcat->id ?>" <?= (isset($subcatrelationemodelitem[$_subcat->id])) ? ' selected="selected"' : '' ?> ><?= $_subcat->name ?></option>
                <?php } ?>
            </select>
        </div>
    <?php } else { ?>
        <?= $form->field($model, 'subcat_relation[]')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(\app\models\Subcat::find()->all(), 'id', 'name'),
            'options' => ['multiple' => true, 'placeholder' => ' ']
        ])->label('جنسیت'); ?>
    <?php } ?>


    <?= $form->field($model, 'planID')->dropDownList(ArrayHelper::map(\app\models\Plan::find()->Where(['status' => 1])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'colorID')->dropDownList(ArrayHelper::map(\app\models\Color::find()->all(), 'id', 'name'), [
        'options' => [
            'style' => 'width:10px;height:10px;border-radius:10px;',
        ],
    ]) ?>
    <?php if ($model->isNewRecord) { ?>
        <?= $form->field($aboutproductmodel, 'details[]')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <a style="font-size:24px;color:green" id="add"> <i class="fa fa-plus"></i> افزودن مشخصات بیشتر</a>
        </div>
    <?php } ?>
    <?php if ($model->isNewRecord == null) {
        foreach ($aboutproductitem as $_about) {
            $aboutproductmodellitems = \app\models\Aboutproduct::findOne($_about->id); ?>
            <div class="form-group field-aboutproduct-details required has-error">
                <label class="control-label" for="aboutproduct-details">مشخصات محصول</label>
                <input type="text" class="form-control" name="details[<?= $_about->id ?>]"
                       value="<?= $aboutproductmodellitems->details ?>" maxlength="512" aria-invalid="true">
                <div class="help-block"></div>
            </div>

        <?php } ?>
        <div class="form-group">
            <a style="font-size:24px;color:green" id="add2"> <i class="fa fa-plus"></i> افزودن مشخصات بیشتر</a>
        </div>
    <?php } ?>


    <?= $form->field($model, 'description')->widget(\dominus77\tinymce\TinyMce::className(), [
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
    ]); ?>

    <!--featureValue input -->
    <?= $form->field($model, 'price')->textInput(['maxlength' => true])->label('قیمت پایه') ?>

    <?= $form->field($model, 'count')->textInput(['maxlength' => true]) ?>

    <?php if ($model->isNewRecord) { ?>
        <div id="p">
            <?= $form->field($featurevaluemodel, 'featureID[]')->dropDownList(
                ArrayHelper::map(\app\models\Feature::find()->all(), 'id', 'value')) ?>

            <?= $form->field($featurevaluemodel, 'value[]')->textInput() ?>

            <?= $form->field($featurevaluemodel, 'price[]')->textInput() ?>

            <?= $form->field($featurevaluemodel, 'count[]')->textInput() ?>
        </div>
        <div class="form-group">
            <a style="font-size:24px;color:green" id="pluss"> <i class="fa fa-plus"></i></a>
        </div>

    <?php } ?>

    <?php if ($model->isNewRecord == null) {
        foreach ($featurevaluemodel as $_feature) {
            $featurevaluemodelitems = \app\models\Featurevalue::findOne($_feature->id); ?>
            <div class="form-group field-featurevalue-featureid">
                <label class="control-label" for="featurevalue-featureid">ویژگی</label>
                <select class="form-control" name="featureID[<?= $_feature->featureID ?>]">
                    <option value="<?= $featurevaluemodelitems->featureID ?>">سایزبندی</option>
                </select>
                <div class="help-block"></div>
            </div>
            <div class="form-group field-featurevalue-value">
                <label class="control-label" for="featurevalue-value">مقدار ویژگی</label>
                <input type="text" class="form-control" name="value[<?= $_feature->id ?>]"
                       value="<?= $featurevaluemodelitems->value ?>">

                <div class="help-block"></div>
            </div>
            <div class="form-group field-featurevalue-price">
                <label class="control-label" for="featurevalue-price">قیمت</label>
                <input type="text" class="form-control" name="price[<?= $_feature->id ?>]"
                       value="<?= $featurevaluemodelitems->price ?>">

                <div class="help-block"></div>
            </div>
            <div class="form-group field-featurevalue-count">
                <label class="control-label" for="featurevalue-count">تعداد</label>
                <input type="text" class="form-control" name="count[<?= $_feature->id ?>]"
                       value="<?= $featurevaluemodelitems->count ?>">

                <div class="help-block"></div>
            </div>
        <?php } ?>
        <div class="form-group">
            <a style="font-size:24px;color:green" id="pluss2"> <i class="fa fa-plus"></i></a>
        </div>
    <?php } ?>

    <?php if ($model->isNewRecord) { ?>
        <!--detailsValue input -->
        <?= $form->field($detailsvaluemodel, 'detailsID[]')->dropdownList(
            ArrayHelper::map(\app\models\Details::find()->all(), 'id', 'value')) ?>

        <?= $form->field($detailsvaluemodel, 'title[]')->textInput(['maxlength' => true]) ?>

        <?= $form->field($detailsvaluemodel, 'value[]')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <a style="font-size:24px;color:green" id="plus2"> <i class="fa fa-plus"></i></a>
        </div>
    <?php } ?>

    <?php if ($model->isNewRecord == null) {
        foreach ($detailsvaluemodel as $_details) {
            $detailsvaluemodelitems = \app\models\Detailsvalue::findOne($_details->id); ?>
            <div class="form-group field-detailsvalue-detailsid required">
                <label class="control-label" for="detailsvalue-detailsid">مشخصات محصول</label>
                <select id="detailsvalue-detailsid" class="form-control" name="detailsID[<?= ($_details->detailsID) ?>]"
                        value="<?= $_details->id ?>">
                    <option value="<?= $detailsvaluemodelitems->detailsID ?>"><?= $detailsvaluemodelitems->details->value ?></option>
                </select>
                <div class="help-block"></div>
            </div>
            <div class="form-group field-detailsvalue-title required">
                <label class="control-label" for="detailsvalue-title">عنوان </label>
                <input type="text" id="detailsvalue-title" class="form-control"
                       name="titledetails[<?= ($_details->id) ?>]" maxlength="255"
                       value="<?= $detailsvaluemodelitems->title ?>">

                <div class="help-block"></div>
            </div>
            <div class="form-group field-detailsvalue-value required">
                <label class="control-label" for="detailsvalue-value">مقدار مشخصات</label>
                <input type="text" id="detailsvalue-value" class="form-control"
                       name="valuedetails[<?= ($_details->id) ?>]" maxlength="50"
                       value="<?= $detailsvaluemodelitems->value ?>">

                <div class="help-block"></div>
            </div>

        <?php } ?>
        <div class="form-group">
            <a style="font-size:24px;color:green" id="plus2"> <i class="fa fa-plus"></i></a>
        </div>
    <?php } ?>

    <?= $form->field($multiupload, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('تصویر') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- add details about product -->
<?php
$script = <<<JS
var aboutproduct=jQuery('.form-group field-aboutproduct-details required ');
aboutproduct.remove();
jQuery('#add').click(()=>{
console.log(1);
jQuery('.form-group field-aboutproduct-details required').remove();
if (jQuery('#add').click) {
    var html='';
        html+= '<div class="form-group field-aboutproduct-details required">';
        html+='<label class="control-label" for="aboutproduct-details">مشخصات محصول</label>';
        html+='<input type="text" id="aboutproduct-details" class="form-control" name="Aboutproduct[details][]" maxlength="512" aria-invalid="true">';
        html+='<div class="help-block"></div>';
        html+='</div>';
     
        jQuery('#add').before(html);
       }else{
    aboutproduct.remove();
}
});


JS;
$this->registerJs($script);
?>
<!-- update record details -->
<?php
$script = <<<JS
var aboutproduct=jQuery('.form-group field-aboutproduct-details required ');
aboutproduct.remove();
jQuery('#add2').click(()=>{
console.log(1);
jQuery('.form-group field-aboutproduct-details required').remove();
if (jQuery('#add2').click) {
    var html='';
        html+= '<div class="form-group field-aboutproduct-details required">';
        html+='<label class="control-label" for="aboutproduct-details">مشخصات محصول</label>';
        html+='<input type="text" class="form-control" name="detailsproduct[]"  maxlength="512" aria-invalid="true">';
        html+='<div class="help-block"></div>';
        html+='</div>';
     
        jQuery('#add2').before(html);
       }else{
    aboutproduct.remove();
}
});


JS;
$this->registerJs($script);
?>


<!-- add feature product -->

<?php
$script = <<<JS

var feature=jQuery('.form-group field-featurevalue-featureid required');
feature.remove();
jQuery('#pluss').click(()=>{
console.log(1);
jQuery('.form-group field-featurevalue-featureid required').remove();
if (jQuery('#pluss').click) {
  var html='';
    $.get("/api/feature").done((data,status)=>{
      console.log(data);
      console.log(status);
      
        html+= '<div class="p1" >';
        html+= '<div class="form-group field-featurevalue-featureid required" >'; 
        html+='<label class="control-label" for="featurevalue-featureid">ویژگی</label>';
        html+='<select id="featurevalue-featureid" class="form-control" name="Featurevalue[featureID][]" aria-required="true">';
      $.each(data.data, function(index, value) {
        html+='<option value="'+value.id+'">'+value.value+'</option>';
      });
        html+='</select>';
        html+='<div class="help-block"></div>';
        html+='</div>';
        html+='<div class="field-featurevalue-value has-success">';
        html+='<label class="control-label" for="">مقدار ویژگی</label>';
        html+='<input type="text" id="featurevalue-value" class="form-control" name="Featurevalue[value][]" maxlength="50" aria-required="true">';
        html+='</div>';
        html+='<div class="form-group field-featurevalue-price">';
        html+='<label class="control-label" for="featurevalue-price">قیمت</label>';
        html+='<input type="text" id="featurevalue-price" class="form-control" name="Featurevalue[price][]">'; 
        html+='<div class="help-block"></div>';
        html+='</div>';
        html+='<div class="form-group field-featurevalue-count">';
        html+='<label class="control-label" for="featurevalue-count">تعداد</label>';
        html+='<input type="text" id="featurevalue-count" class="form-control" name="Featurevalue[count][]">'; 
        html+='<div class="help-block"></div>';
        html+='</div>'; 
        html+='</div>'; 
        jQuery('#pluss').before(html);
    });

        
 }else{
  feature.remove();
 }
});


JS;
$this->registerJs($script);
?>

<!--update product-->
<!-- add feature product -->

<?php
$script = <<<JS

var feature=jQuery('.form-group field-featurevalue-featureid required');
feature.remove();
jQuery('#pluss2').click(()=>{
console.log(1);
jQuery('.form-group field-featurevalue-featureid required').remove();
if (jQuery('#pluss2').click) {
  var html='';
    $.get("/api/feature").done((data,status)=>{
      console.log(data);
      console.log(status);
      
        html+= '<div class="p1" >'; 
        html+= '<div class="form-group field-featurevalue-featureid required" >'; 
        html+='<label class="control-label" for="featurevalue-featureid">ویژگی</label>';
        html+='<select id="featurevalue-featureid" class="form-control" name="ProductfeatureID[]" aria-required="true">';
      $.each(data.data, function(index, value) {
        html+='<option value="'+value.id+'">'+value.value+'</option>';
      });
        html+='</select>';
        html+='<div class="help-block"></div>';
        html+='</div>';
        html+='<div class="field-featurevalue-value has-success">';
        html+='<label class="control-label" for="">مقدار ویژگی</label>';
        html+='<input type="text" id="featurevalue-value" class="form-control" name="Productvalue[]" maxlength="50" aria-required="true">';
        html+='</div>';
        html+='<div class="form-group field-featurevalue-price">';
        html+='<label class="control-label" for="featurevalue-price">قیمت</label>';
        html+='<input type="text" id="featurevalue-price" class="form-control" name="Productprice[]">'; 
        html+='<div class="help-block"></div>';
        html+='</div>';
        html+='<div class="form-group field-featurevalue-count">';
        html+='<label class="control-label" for="featurevalue-count">تعداد</label>';
        html+='<input type="text" id="featurevalue-count" class="form-control" name="Productcount[]">'; 
        html+='<div class="help-block"></div>';
        html+='</div>'; 
        html+='</div>'; 
        jQuery('#pluss2').before(html);
    });

        
 }else{
  feature.remove();
 }
});


JS;
$this->registerJs($script);
?>


<!-- add details  product -->

<?php
$script = <<<JS

var details=jQuery('.form-group field-detailsvalue-detailsid required');
details.remove();
jQuery('#plus').click(()=>{
console.log(1);
jQuery('.form-group field-detailsvalue-detailsid required').remove();
if (jQuery('#plus').click) {
  var html='';
    $.get("/api/details").done((data,status)=>{
      console.log(data);
      console.log(status);
      
        html+= '<div class="form-group field-detailsvalue-detailsid required">';
        html+='<label class="control-label" for="detailsvalue-detailsid">مشخصات</label>';
        html+='<select id="detailsvalue-detailsid" class="form-control" name="Detailsvalue[detailsID][]" aria-required="true">';
      $.each(data.data, function(index, value) {
        html+='<option value="'+value.id+'">'+value.value+'</option>';
      });
    
        html+='</select>';
        html+='<div class="help-block"></div>';
        html+='</div>';
        html+='<label class="control-label" for="">عنوان</label>';
        html+='<input type="text" id="Detailsvalue-title" class="form-control" name="Detailsvalue[title][]" maxlength="50" aria-required="true">';
        html+='<label class="control-label" for="">مقدار</label>';
        html+='<input type="text" id="Detailsvalue-value" class="form-control" name="Detailsvalue[value][]" maxlength="50" aria-required="true">';
       
        html+='</div>';
        jQuery('#plus').before(html);
    });

        
 }else{
  details.remove();
 }
});


JS;
$this->registerJs($script);
?>


<?php
$script = <<<JS

var details=jQuery('.form-group field-detailsvalue-detailsid required');
details.remove();
jQuery('#plus2').click(()=>{
console.log(1);
jQuery('.form-group field-detailsvalue-detailsid required').remove();
if (jQuery('#plus2').click) {
  var html='';
    $.get("/api/details").done((data,status)=>{
      console.log(data);
      console.log(status);
      
        html+= '<div class="form-group field-detailsvalue-detailsid required">';
        html+='<label class="control-label" for="detailsvalue-detailsid">مشخصات</label>';
        html+='<select id="detailsvalue-detailsid" class="form-control" name="detailsvalueID[]" aria-required="true">';
      $.each(data.data, function(index, value) {
        html+='<option value="'+value.id+'">'+value.value+'</option>';
      });
    
        html+='</select>';
        html+='<div class="help-block"></div>';
        html+='</div>';
        html+='<label class="control-label" for="">عنوان</label>';
        html+='<input type="text" id="Detailsvalue-title" class="form-control" name="detailsvaluetitle[]" maxlength="50" aria-required="true">';
        html+='<label class="control-label" for="">مقدار</label>';
        html+='<input type="text" id="Detailsvalue-value" class="form-control" name="detailsvaluevalue[]" maxlength="50" aria-required="true">';
       
        html+='</div>';
        jQuery('#plus2').before(html);
    });

        
 }else{
  details.remove();
 }
});


JS;
$this->registerJs($script);
?>
<?php
$script = <<<JS
 
  $("#product-cat_relation1").select2();
  $("#product_category").select2();
  $("#product-subcat_relation1").select2();
JS;
$this->registerJs($script);
?>  