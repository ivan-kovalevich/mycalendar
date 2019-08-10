<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $author;
    public $title;
    public $description;
    public $dateStart;
    public $dateEnd;
    public $isBlocked;
    public $isRepeated;
    // public typeRepeat; //ежечасно, ежедневно, ежемесячно, ежегодно

    public function rules()
    {
        return [
            ['title','required'],
            ['description', 'string', 'min' =>5],
            ['dateStart', 'string'],
            ['dateEnd', 'string'],
            ['isBlocked', 'boolean'],
            ['isRepeated', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'dateStart' => 'Событие начать',
            'dateEnd' => 'Событие закончить',
            'isBlocked' => 'Это одно событие на целый день',
            'isRepeated' => 'Повторяющееся событие',
        ];
    }
}