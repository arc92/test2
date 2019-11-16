<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Blogvideo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blogvideo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'blogID')->dropDownList(
      ArrayHelper::map(\app\models\Blog::find()->all(), 'id', 'name')) ?>
      
    <?= $form->field($video, 'videoFile')->fileInput()->label('ویدئو') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
