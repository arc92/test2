<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sitename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($uploads, 'imageFile')->fileInput() ?> 

    <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>

    <?= $form->field($upload, 'imgFile')->fileInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_contactus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_contactus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_aboutus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_aboutus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_faq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_faq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_transport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_transport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_size')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_size')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_blog')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_blog')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_blogsingle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_blogsingle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_branches')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_branches')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_certificates')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_certificates')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_privacy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_privacy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_help')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_help')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_cart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_cart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_endstep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_endstep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_collection')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_collection')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_collection_inside')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_collection_inside')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_product')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_product')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_product_index')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_product_index')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_girlgrid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_girlgrid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_boygrid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_boygrid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_girlbaby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_girlbaby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_boybaby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_boybaby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_child')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_child')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_baby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_baby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_menulink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_menulink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_product_index2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_product_index2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_baby_clothing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_baby_clothing')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
