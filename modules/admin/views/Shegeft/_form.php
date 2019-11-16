<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Shegeft */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shegeft-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'productID')->dropDownList(ArrayHelper::map(\app\models\Product::find()->all(), 'id', 'name')) ?> 

    <?= $form->field($model, 'off')->textInput() ?>
 
    <?= $form->field($model, 'date')->widget(jDate\DatePicker::className()) ?>

    <?= $form->field($model, 'status')->dropdownList([
        '1'=>'فعال',
        '0'=>'غیر فعال'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
