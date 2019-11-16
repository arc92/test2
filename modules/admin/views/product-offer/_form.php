<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\ProductOffer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-offer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id[]')->dropDownList(ArrayHelper::map(\app\models\Product::find()->all(), 'id', 'name'),[
        'prompt'=>'لطفا انتخاب کنید','multiple'=>'multiple'
    ]) ?>

    <?= $form->field($model, 'percent')->textInput() ?>

    <?= $form->field($model, 'offer')->textInput() ?>

    <?= $form->field($model, 'expire_date')->widget(jDate\DatePicker::className()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
