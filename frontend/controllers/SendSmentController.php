<?php

namespace frontend\controllers;

use frontend\models\SMent;
use Yii;

class SendSmentController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $model = new SMent();
        if ($this->request->isPost) {

            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Your application has been successfully sent');
                return $this->goHome();
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('index',
        ['model' => $model]);
    }

}
