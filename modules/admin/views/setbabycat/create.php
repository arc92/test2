<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Setbabycat */

$this->title = 'افزودن';
$this->params['breadcrumbs'][] = ['label' => 'Setbabycats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setbabycat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
    ]) ?>

</div>
