<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Off */

$this->title = 'افزودن تخفیف کلی';
$this->params['breadcrumbs'][] = ['label' => 'Offs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="off-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
