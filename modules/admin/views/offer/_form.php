<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Offer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offer-form">

    <?php $form = ActiveForm::begin(); ?>

 

    <?= $form->field($model, 'planID')->dropDownList(ArrayHelper::map(\app\models\Plan::find()->all(), 'id', 'name'),[
        'prompt'=>'لطفا انتخاب کنید'
    ]) ?>

    <?= $form->field($model, 'start_date')->widget(jDate\DatePicker::className()) ?>

    <?= $form->field($model, 'end_date')->widget(jDate\DatePicker::className()) ?>

    <?= $form->field($model, 'percent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
