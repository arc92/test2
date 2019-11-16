<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Tagblog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tagblog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'blogID')->dropDownList(ArrayHelper::map(\app\models\Blog::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
