<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aboutfeature */

$this->title = 'Create Aboutfeature';
$this->params['breadcrumbs'][] = ['label' => 'Aboutfeatures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutfeature-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
