<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aboutus */

$this->title = 'افزودن';
$this->params['breadcrumbs'][] = ['label' => 'Aboutuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'multiupload'=>$multiupload,
    ]) ?>

</div>
