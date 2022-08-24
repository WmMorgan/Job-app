<style>
        form.form-horizontal {
            width: 100%;
            padding: 20px;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 0 25px 0 #1c87c9;
        }
        .banner {
            position: relative;
            height: 210px;
            background-image: url("https://www.davidarehabilitacion.com/wp-content/uploads/2018/10/img-casos-clinicos-v1.jpg");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .banner::after {
            content: "";
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            width: 100%;
            height: 100%;
        }
        h1 {
            position: absolute;
            margin: 0;
            font-size: 38px;
            color: #fff;
            z-index: 2;
        }
        p.top-info {
            margin: 10px 0;
        }

     p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
            line-height: 22px;
        }
    </style>


    <?php
    use yii\helpers\Html;
    use yii\bootstrap5\ActiveForm;

    $age = range(14, 35);
    $form = ActiveForm::begin([
        'id' => 'send-sment',
        'options' => ['class' => 'form-horizontal']
    ]) ?>
<div class="banner">
    <h1>Job Application Form</h1>
</div>
<p class="top-info">Thank you for your interest in working with us. Send your application by filling out the Job Application Form.</p>


<div class="row justify-content-center">
    <?= $form->field($model, 'name', ['options' => ['class' => 'col-6']]) ?>
    <?= $form->field($model, 'family_name', ['options' => ['class' => 'col-6']]) ?>
</div>
<div class="row justify-content-center">
    <?= $form->field($model, 'address', ['options' => ['class' => 'col-6']]) ?>
    <?= $form->field($model, 'country_of_origin', ['options' => ['class' => 'col-6']]) ?>
</div>
<div class="row justify-content-center">
    <?= $form->field($model, 'email_address', ['options' => ['class' => 'col-6']]) ?>
    <?= $form->field($model, 'phone_number', ['options' => ['class' => 'col-6']])->hint('raqam formati: +998915377732') ?>
</div>
    <?= $form->field($model, 'age', ['options' => ['class' => 'col-6']])->dropDownList(array_combine($age, $age), ['prompt' => 'yoshi']) ?>
<br/>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Topshirish', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>



