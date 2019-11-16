<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Certificates */

$this->title = 'افزودن گواهینامه';
$this->params['breadcrumbs'][] = ['label' => 'Certificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload'=>$upload,
    ]) ?>

</div>
