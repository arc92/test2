<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Blogcat */

$this->title = 'دسته بندی وبلاگ';
$this->params['breadcrumbs'][] = ['label' => 'Blogcats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogcat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
