<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = 'افزودن تنظیمات';
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
        'uploads' => $uploads,
    ]) ?>

</div>
