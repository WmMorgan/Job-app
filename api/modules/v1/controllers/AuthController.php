<?php


namespace api\modules\v1\controllers;


use api\modules\v1\models\LoginForm;
use yii\rest\Controller;

class AuthController extends Controller
{

    public function actionLogin()
    {
        $login = new LoginForm();
        if($login->load(\Yii::$app->request->post(), '') && ($token = $login->login()))
        {
            return ['token' => $token];
        } else {
            return $login;
        }
    }

}