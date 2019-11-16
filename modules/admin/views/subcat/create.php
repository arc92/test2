<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Subcat */

$this->title = 'افزودن زیر دسته بندی';
$this->params['breadcrumbs'][] = ['label' => 'Subcats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
