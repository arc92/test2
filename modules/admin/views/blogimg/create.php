<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Blogimg */

$this->title = 'Create Blogimg';
$this->params['breadcrumbs'][] = ['label' => 'Blogimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogimg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
