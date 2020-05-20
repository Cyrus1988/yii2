<?php
/**
 * Created by PhpStorm.
 * User: listex51
 * Date: 5/14/20
 * Time: 4:25 PM
 */

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

class TaskSearch extends Model
{
    public $name;

    public function rules()
    {

        return [
            [['name'], 'string'],
        ];
    }

}