<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tagblog */

$this->title = 'افزودن';
$this->params['breadcrumbs'][] = ['label' => 'Tagblogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tagblog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
