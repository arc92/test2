<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SettingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sitename') ?>

    <?= $form->field($model, 'logo') ?>

    <?= $form->field($model, 'about') ?>

    <?= $form->field($model, 'footerlogo') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'title_contactus') ?>

    <?php // echo $form->field($model, 'description_contactus') ?>

    <?php // echo $form->field($model, 'title_aboutus') ?>

    <?php // echo $form->field($model, 'description_aboutus') ?>

    <?php // echo $form->field($model, 'title_faq') ?>

    <?php // echo $form->field($model, 'description_faq') ?>

    <?php // echo $form->field($model, 'title_transport') ?>

    <?php // echo $form->field($model, 'description_transport') ?>

    <?php // echo $form->field($model, 'title_size') ?>

    <?php // echo $form->field($model, 'description_size') ?>

    <?php // echo $form->field($model, 'title_blog') ?>

    <?php // echo $form->field($model, 'description_blog') ?>

    <?php // echo $form->field($model, 'title_blogsingle') ?>

    <?php // echo $form->field($model, 'description_blogsingle') ?>

    <?php // echo $form->field($model, 'title_branches') ?>

    <?php // echo $form->field($model, 'description_branches') ?>

    <?php // echo $form->field($model, 'title_certificates') ?>

    <?php // echo $form->field($model, 'description_certificates') ?>

    <?php // echo $form->field($model, 'title_privacy') ?>

    <?php // echo $form->field($model, 'description_privacy') ?>

    <?php // echo $form->field($model, 'title_help') ?>

    <?php // echo $form->field($model, 'description_help') ?>

    <?php // echo $form->field($model, 'title_cart') ?>

    <?php // echo $form->field($model, 'description_cart') ?>

    <?php // echo $form->field($model, 'title_endstep') ?>

    <?php // echo $form->field($model, 'description_endstep') ?>

    <?php // echo $form->field($model, 'title_collection') ?>

    <?php // echo $form->field($model, 'description_collection') ?>

    <?php // echo $form->field($model, 'title_collection_inside') ?>

    <?php // echo $form->field($model, 'description_collection_inside') ?>

    <?php // echo $form->field($model, 'title_product') ?>

    <?php // echo $form->field($model, 'description_product') ?>

    <?php // echo $form->field($model, 'title_product_index') ?>

    <?php // echo $form->field($model, 'description_product_index') ?>

    <?php // echo $form->field($model, 'title_girlgrid') ?>

    <?php // echo $form->field($model, 'description_girlgrid') ?>

    <?php // echo $form->field($model, 'title_boygrid') ?>

    <?php // echo $form->field($model, 'description_boygrid') ?>

    <?php // echo $form->field($model, 'title_girlbaby') ?>

    <?php // echo $form->field($model, 'description_girlbaby') ?>

    <?php // echo $form->field($model, 'title_boybaby') ?>

    <?php // echo $form->field($model, 'description_boybaby') ?>

    <?php // echo $form->field($model, 'title_child') ?>

    <?php // echo $form->field($model, 'description_child') ?>

    <?php // echo $form->field($model, 'title_baby') ?>

    <?php // echo $form->field($model, 'description_baby') ?>

    <?php // echo $form->field($model, 'title_menulink') ?>

    <?php // echo $form->field($model, 'description_menulink') ?>

    <?php // echo $form->field($model, 'title_product_index2') ?>

    <?php // echo $form->field($model, 'description_product_index2') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
