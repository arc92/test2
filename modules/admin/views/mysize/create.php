<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mysize */

$this->title = 'افزودن سایز البسه';
$this->params['breadcrumbs'][] = ['label' => 'Mysizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mysize-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
