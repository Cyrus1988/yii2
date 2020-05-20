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
//    public function rules()
//    {
//        // только поля определенные в rules() будут доступны для поиска
//        return [
//            [['name'], 'string'],
//        ];
//    }

    public function rules()
    {
        // только поля определенные в rules() будут доступны для поиска
        return [
            [['name'], 'string'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Task::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // загружаем данные формы поиска и производим валидацию
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // изменяем запрос добавляя в его фильтрацию
        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }

}