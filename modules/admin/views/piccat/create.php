<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Piccat */

$this->title = 'افزودن';
$this->params['breadcrumbs'][] = ['label' => 'Piccats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="piccat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
        'uploads' => $uploads,
    ]) ?>

</div>
