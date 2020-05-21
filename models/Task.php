<?php
/**
 * Created by PhpStorm.
 * User: listex51
 * Date: 5/12/20
 * Time: 4:11 PM
 */

namespace app\models;


use yii\db\ActiveRecord;

class Task extends ActiveRecord
{
    public static function tableName()
    {
        return 'task';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Task name',
            'type' => 'Type',
            'status'=>'Status',
            'description'=>'Description',
            'start_date'=>'дата начала',
            'end_date'=>'дата окончания'
        ];
    }

    public function rules()
    {
        return [
            [['name','start_date','end_date'],'required',],
            [['name','type','status','description'],'string'],
            [['start_date','end_date'],'date','format' => 'php:Y-m-d'],
            ['status','statusRule'],
            ['type','typeRule'],
        ];
    }

    public function statusRule($attr)
    {
        if (!in_array($this->$attr, [
            'В работе',
            'Выполнено',
            'Готова к тестированию']))
        {
            $this->addError($attr,'Wrong status');
        }
    }

    public function typeRule($attr)
    {
        if (!in_array($this->$attr, [
            'Task',
            'Bug']))
        {
            $this->addError($attr,'Wrong type');
        }
    }
}