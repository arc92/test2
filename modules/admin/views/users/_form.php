<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput() ?>
    
    <?= $form->field($model, 'role')->dropDownList([
    'admin'=>'ادمین',
    'user'=>'کاربر',
    ]) ?>

<?= $form->field($model, 'active')->dropDownList([
            '1'=>'فعال',
            '0'=>'غیر فعال',
        ]) ?>

<?php if(!$model->isNewRecord){?>
    <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput() ?>

    <?= $form->field($model, 'tell')->textInput() ?>

    <?= $form->field($model, 'day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mounth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($upload, 'imageFile')->fileInput()->label(false) ?>

    <?= $form->field($model, 'submitDate')->textInput() ?>

        <?= $form->field($model, 'active')->dropDownList([
            '1'=>'فعال',
            '0'=>'غیر فعال',
        ]) ?>

        <?php } ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
