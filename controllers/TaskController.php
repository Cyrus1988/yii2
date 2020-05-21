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
    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,

        ]);
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
        $task = Task::findOne(['id' => $id]);


        //проверить и доработать
//        if(Yii::$app->request->isAjax)
//        {
//            echo 'hello';
//        }

        if($task->load(Yii::$app->request->post())){
            if($task->save()){
                Yii::$app->session->setFlash('success','Данные приняты, Задача создана');
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
