<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SMent */

$this->title = 'Update S Ment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'S Ments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
