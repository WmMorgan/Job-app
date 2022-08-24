<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SMent */

$this->title = 'Create S Ment';
$this->params['breadcrumbs'][] = ['label' => 'S Ments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
