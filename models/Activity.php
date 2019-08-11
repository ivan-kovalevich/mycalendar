<?php


namespace app\models;


use app\models\rules\StopListRules;
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
    public $repeatedType;

    public const REPEATED_TYPE = [
        1 => 'Каждый день',
        2 => 'Каждый месяц заданного числа',
        3 => 'Каждую неделю'
    ];

    public $useNotification;
    public $email;
    public $emailRepeat;

    public $file;

    // public typeRepeat; //ежечасно, ежедневно, ежемесячно, ежегодно

    public function beforeValidate()
    {
        $date = \DateTime::createFromFormat('d.m.Y H:i', $this->dateStart);
        if ($date) {
            $this->dateStart = $date->format('Y-m-d');
        }
        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            ['title', 'trim'],
            [['title'], 'required'],
            ['dateStart','required','message' => 'Дата старта события обязательно'],
            ['description', 'string', 'min' => 5, 'max' => 150],
//            ['inn','string','length'=>10],
            ['dateStart', 'date', 'format' => 'php:Y-m-d'],
            ['dateStart', 'string'],
            ['file','file','extensions' => ['jpg','png']],
            ['repeatedType','in','range' => array_keys(self::REPEATED_TYPE)],
            ['dateEnd', 'string'],
            ['email','email'],
//            ['title','titleStopRule'],
            ['title',StopListRules::class,'stopList' => ['шаурма','бордюр']],
//            ['email','match','pattern' =>'//'],
            [['email','emailRepeat'],'required','when' => function($model){
                return $model->useNotification?true:false;
            }],
            ['emailRepeat','compare','compareAttribute' => 'email'],
            [['isBlocked', 'isRepeated', 'useNotification'], 'boolean'],
        ];
    }

    public function titleStopRule($attr){
        $arr=['шаурма','бордюр'];
        if(in_array($this->title,$arr)){
            $this->addError('title','Значение заголовка находится в стоп-листе');
        }
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