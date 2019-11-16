<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detailsvalue */

$this->title = 'افزودن مقدار ویژگی ';
$this->params['breadcrumbs'][] = ['label' => 'Detailsvalues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailsvalue-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
