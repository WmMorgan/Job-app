<?php

namespace api\modules\v1\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;


/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class StatamentController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Statament';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBasicAuth::class,
                HttpBearerAuth::class
            ],
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        $actions['create']['class'] = 'api\modules\v1\CreateAction';
        return $actions;
    }
}