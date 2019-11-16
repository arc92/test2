<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bascket */

$this->title = 'Create Bascket';
$this->params['breadcrumbs'][] = ['label' => 'Basckets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bascket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
