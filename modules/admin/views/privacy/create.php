<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Privacy */

$this->title = 'افزودن';
$this->params['breadcrumbs'][] = ['label' => 'Privacies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="privacy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
