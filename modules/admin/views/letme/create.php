<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Letme */

$this->title = 'Create Letme';
$this->params['breadcrumbs'][] = ['label' => 'Letmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="letme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
