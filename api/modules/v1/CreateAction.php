<?php

namespace api\modules\v1;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\ServerErrorHttpException;

class CreateAction extends \yii\rest\CreateAction
{
    public $scenario = Model::SCENARIO_DEFAULT;
    public $viewAction = 'view';
    /**
     * @var mixed
     */
    private $interviewClass = 'api\modules\v1\models\Interview';

    public function run($id = null)
    {

        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id);
        }
//
if($id) return $this->createInterview($id); else return $this->create();
    }

    /**
     * @return mixed
     * @throws ServerErrorHttpException
     * @throws \yii\base\InvalidConfigException
     */
    private function create() {
        $model = new $this->modelClass([
            'scenario' => $this->scenario,
        ]);

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
            $_id = implode(',', $model->getPrimaryKey(true));
            $response->getHeaders()->set('Location', Url::toRoute([$this->viewAction, 'id' => $_id], true));
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }

        return $model;
    }

    /**
     * @param $id
     * @return mixed
     * @throws ServerErrorHttpException
     * @throws \yii\base\InvalidConfigException
     */
    private function createInterview($id) {
        $model = new $this->interviewClass([
            'scenario' => $this->scenario,
        ]);
        $model->statament_id = $id;
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
            $modelSment = $this->findModel($id);
            $modelSment->hired = 1;
            $modelSment->save();// status:Intervyu belgilandi.
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);

            $response->getHeaders()->set('Location', Url::toRoute([$this->viewAction, 'id' => $id], true));
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('The interview could not be created for an unknown reason. @europlusmp3 :D');
        }

        return $model;
    }
}