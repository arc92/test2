<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Questionhelp */

$this->title = 'افزودن';
$this->params['breadcrumbs'][] = ['label' => 'Questionhelps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questionhelp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
