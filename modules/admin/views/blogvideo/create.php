<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Blogvideo */

$this->title = 'افزودن ویدیو';
$this->params['breadcrumbs'][] = ['label' => 'Blogvideos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogvideo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'video'=>$video,
    ]) ?>

</div>
