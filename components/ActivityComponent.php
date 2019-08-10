<?php


namespace app\components;


use app\base\BaseComponent;
use app\models\Activity;


class ActivityComponent extends BaseComponent
{
    public $classModel;

    public function getModel()
    {
        return new $this->classModel();
    }

    public function createActivity(Activity &$activity): bool
    {
        if ($activity->validate()) {
            return true;
        }
        return false;
    }
}