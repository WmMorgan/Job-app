
<?php

use frontend\models\SMent;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apply for a job';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Job app', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'family_name',
            'address',
            //'country_of_origin',
            'email_address:email',
            'phone_number',
            'age',
            [
                'class' => 'yii\grid\DataColumn',
                'label' => 'Status',
                'attribute' => 'hired',
                'value' => function($data) {
        $status = [0 => 'yangi', 1 => 'intervyu belgilangan', 2 => 'qabul qilingan', 3 => 'qabul qilinmagan'];
                return $status[$data->hired];
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SMent $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                'template' => '{view} {update} {delete} {interview}',
                'buttons' => [
                    'interview' => function($url, $model, $key) {// render your custom button
                        $color = $model->interview ? 'color: orange;': false;
                        return Html::a(Html::tag('i', '', ['class' => 'fas fa-user-clock', 'style'=>"font-size: 20px;".$color]), Url::toRoute([$url]));
                }],
                'icons' => [
                        'eye-open' => Html::tag('i', '', ['class' => 'fas fa-eye', 'style'=>"font-size: 20px"]),
                    'pencil' => Html::tag('i', '', ['class' => 'fas fa-pencil-alt', 'style'=>"font-size: 20px"]),
                    'trash' => Html::tag('i', '', ['class' => 'fas fa-times-circle', 'style'=>"font-size: 20px"]),
                ]
            ],
        ],
    ]); ?>


</div>
