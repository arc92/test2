<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Icon */

$this->title = 'افزودن';
$this->params['breadcrumbs'][] = ['label' => 'Icons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="icon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload'=>$upload,
    ]) ?>

</div>
