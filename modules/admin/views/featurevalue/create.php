<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Featurevalue */

$this->title = 'افزودن مقدار ویژگی';
$this->params['breadcrumbs'][] = ['label' => 'Featurevalues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="featurevalue-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
