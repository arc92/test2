<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Details */

$this->title = 'افزودن مشخصات';
$this->params['breadcrumbs'][] = ['label' => 'Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
