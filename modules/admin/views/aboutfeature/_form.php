<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aboutfeature */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aboutfeature-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aboutID')->textInput() ?>

    <?= $form->field($model, 'titr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'years')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
