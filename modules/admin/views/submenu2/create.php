<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Submenu2 */

$this->title = 'افزودن زیر منو';
$this->params['breadcrumbs'][] = ['label' => 'Submenu2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="submenu2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload'=>$upload,
    ]) ?>

</div>
