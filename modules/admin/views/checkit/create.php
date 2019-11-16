<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Checkit */

$this->title = 'Create Checkit';
$this->params['breadcrumbs'][] = ['label' => 'Checkits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
