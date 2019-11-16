<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aboutimg */

$this->title = 'افزودن تصاویر درباره بی سی سی ';
$this->params['breadcrumbs'][] = ['label' => 'Aboutimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutimg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
    ]) ?>

</div>
