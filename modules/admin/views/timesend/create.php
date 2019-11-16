<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Timesend */

$this->title = 'افزودن تعداد ارسال';
$this->params['breadcrumbs'][] = ['label' => 'Timesends', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timesend-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
