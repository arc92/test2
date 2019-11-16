<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Off */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="off-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'percent')->textInput()->hint('لطفا فقط عدد وارد کنید') ?>

    <?= $form->field($model, 'status')->dropdownList([
        '1'=>'فعال',
        '0'=>'غیر فعال',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
