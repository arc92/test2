<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Blogcomment */

$this->title = 'Create Blogcomment';
$this->params['breadcrumbs'][] = ['label' => 'Blogcomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogcomment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
