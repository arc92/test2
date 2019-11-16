<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Menu2 */

$this->title = 'افزودن';
$this->params['breadcrumbs'][] = ['label' => 'Menu2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
    ]) ?>

</div>
