<?php

namespace app\controllers\actions\activity;

use app\base\BaseAction;
use app\models\Activity;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ActivityCreateAction extends BaseAction
{

    public function run()
    {
        $model = \Yii::$app->activity->getModel();
        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->request->isAjax){
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if (\Yii::$app->activity->createActivity($model)) {
//                print_r('ok');exit;
            } else {
//                print_r('no');exit;
            }
            //print_r($model->getAttributes());
            //exit;
        }
        return $this->controller->render('create', ['model' => $model]);
    }
}