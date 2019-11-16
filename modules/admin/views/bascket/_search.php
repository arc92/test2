<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BascketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bascket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cartID') ?>

    <?= $form->field($model, 'recived') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'family') ?>

    <?php // echo $form->field($model, 'stateID') ?>

    <?php // echo $form->field($model, 'cityID') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'day') ?>

    <?php // echo $form->field($model, 'timeID') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'memeber') ?>

    <?php // echo $form->field($model, 'authority') ?>

    <?php // echo $form->field($model, 'refID') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'submitDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
