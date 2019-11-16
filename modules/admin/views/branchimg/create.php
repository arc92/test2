<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Branchimg */

$this->title = 'افزودن تصویر شعبه';
$this->params['breadcrumbs'][] = ['label' => 'Branchimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branchimg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload'=>$upload,
    ]) ?>

</div>
