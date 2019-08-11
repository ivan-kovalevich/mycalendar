<?php

namespace app\controllers\actions\activity;

use app\base\BaseAction;
use app\models\Activity;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ActivityCreateAction extends BaseAction
{

    public function run()
    {
//        $arr=['one'=>'val1','two'=>['three'=>'value2']];
//        $db=[['id'=>2,'name'=>'Klaus','lastName'=>'Branbie'],['id'=>4,'name'=>'Родион','lastName'=>'Руденко']];
//        $value=ArrayHelper::getValue($arr,'two.three');
//        print_r($value);
//        $arr=ArrayHelper::map($db,'id',function ($record){
//            return ArrayHelper::getValue($record,'lastName').' '.ArrayHelper::getValue($record,'name');
//        });
//
//        print_r($arr);
//        exit;
        $model = \Yii::$app->activity->getModel();
        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->request->isAjax){
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if (\Yii::$app->activity->createActivity($model)) {
                return $this->controller->render('view',['model'=>$model]);
            } else {
//                print_r('no');exit;
            }
            //print_r($model->getAttributes());
            //exit;
        }
        return $this->controller->render('create', ['model' => $model]);
    }
}