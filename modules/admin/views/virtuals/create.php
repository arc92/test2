<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Virtuals */

$this->title = 'افزودن شبک های مجازی';
$this->params['breadcrumbs'][] = ['label' => 'Virtuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="virtuals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
