<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cathelp */

$this->title = 'افزودن دسته بندی ';
$this->params['breadcrumbs'][] = ['label' => 'Cathelps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cathelp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
