<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SMent */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'S Ments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $status = ['yangi', 'intervyu belgilangan', 'qabul qilingan', 'qabul qilinmagan']; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'family_name',
            'address',
            'country_of_origin',
            'email_address:email',
            'phone_number',
            'age',
            [                                                  // name свойство зависимой модели owner
                'label' => 'Hired',
                'value' => $status[$model->hired]
            ],
        ],
    ]) ?>

</div>
