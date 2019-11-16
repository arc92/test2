<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contentcategory */

$this->title = 'افزودن';
$this->params['breadcrumbs'][] = ['label' => 'Contentcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contentcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
