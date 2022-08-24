<?php

use kartik\time\TimePicker;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SMent */



$this->title = 'Set Interview S Ment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'S Ments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Interview';
?>
<div class="sment-update">

    <h1><?= Html::encode($this->title). $interview->note ?></h1>

    <div class="sment-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($interview, 'interview_time')->widget(TimePicker::className(),
            [
                'name' => 'inerview_time',
                'pluginOptions' => [
                    'showSeconds' => false,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ],
                'addonOptions' => [

                ],
            ]) ?>

        <?= $form->field($interview, 'note')->textarea(['maxleght' => 500]) ?>


        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php


/*
$form->field($interview, 'interview_time')->widget(DateTimePicker::className(), [
    'language' => 'es',
    'size' => 'ms',
    'template' => '{input}',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => true,
    'clientOptions' => [
        'startView' => 1,
        'minView' => 0,
        'maxView' => 1,
        'autoclose' => true,
        'linkFormat' => 'HH:ii P', // if inline = true
        // 'format' => 'HH:ii P', // if inline = false
        'todayBtn' => true
    ]
]); */?>
