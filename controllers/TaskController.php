<?php
/**
 * Created by PhpStorm.
 * User: listex51
 * Date: 5/1/20
 * Time: 5:31 PM
 */

namespace app\controllers;

use app\models\Task;
use app\models\TaskSearch;
use app\models\TestForm;
use Yii;
use yii\helpers\Html;

class TaskController extends AppController
{

    public function actionIndex()
    {
        $tasks = Task::find()->asArray()->all();
        return $this->render('index',compact('tasks'));
    }

    public function beforeAction($action)
    {
        $model = new TaskSearch();
        if($model->load(Yii::$app->request->post()))
        {
            $name = Html::encode($model->name);
            return $this->redirect(Yii::$app->urlManager->createUrl(['task/search','name'=>$name]));
        }
        return true;
    }

    public function actionSearch()
    {
//        $name = Yii::$app->request->post();
        $name = Yii::$app->getRequest()->getQueryParam('name');
//        $query = Task::find()->where(['like','name',$name]);
        $tasks = Task::find()->asArray()->where(['like','name', $name])->all();

        return $this->render('search',[
            'name'=>$name,
            'tasks'=>$tasks,
        ]);
    }

    public function actionCreate()
    {
        $model = new Task();

        if($model->load(Yii::$app->request->post())){
            if($model->save()){
                Yii::$app->session->setFlash('success','Данные приняты');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error','Ошибка');
            }
        }

        return $this->render('create',compact('model'));
    }

    public function actionDelete($id)
    {
        $task = Task::findOne($id)->delete();
        if($task)
        {
            Yii::$app->getSession()->setFlash('message','Task was successfully deleted');
            return $this->redirect('index');
        }


    }

    public function actionShow()
    {

        $id = Yii::$app->request->get('id');


//        $country = Country::find()->orderBy(['name'=>SORT_DESC])->all();
//        $country = Country::find()->asArray()->where('code="CA"')->all();
//        $country = Country::find()->asArray()->where(['code' => 'CA'])->all();
//        $country = Country::find()->asArray()->where(['like','code', 'C'])->all();
//        $country = Country::find()->asArray()->where(['<=','population', 81459000])->all();
//        $country = Country::find()->asArray()->where(['<=','population', 81459000])->limit(1)->all();
//        $country = Country::find()->asArray()->where(['<=','population', 81459000])->limit(1)->one();
//        $country = Country::find()->asArray()->where(['<=','population', 81459000])->count();
//        $country = Country::findOne(['code' => 'CA']);
//        $country = Country::findAll(['code' => 'CA']);
//        $query = "select * from country where population <= 81459000";

//        $query = "select * from country where population <= :search";
//        $country = Country::findBySql($query,['search'=>81459000])->all();

        $task = Task::findOne(['id' => $id]);


        //проверить и доработать
//        if(Yii::$app->request->isAjax)
//        {
//            echo 'hello';
//        }

        if($task->load(Yii::$app->request->post())){
            if($task->save()){
                Yii::$app->session->setFlash('success','Данные приняты');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error','Ошибка');
            }
        }

        return $this->render('show', [
            'task' => $task
            ]);
    }

    public function actionTest()
    {
        return $this->render('test');
    }
}
