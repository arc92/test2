<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Blogcomment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blogcomment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'blogID')->textInput() ?>

    <?= $form->field($model, 'userID')->textInput() ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropdownlist([
        '1'=>'تایید',
        '0'=>'لغو',
    ]) ?>

    <?= $form->field($model, 'create_date')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
