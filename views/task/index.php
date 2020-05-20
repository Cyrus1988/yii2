<?php

/* @var $this yii\web\View */

use app\models\TaskSearch;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'My Yii Application';

$model = new TaskSearch();

?>

<div class="site-index">
    <div class="body-content">
        <div class="row">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model,'name')->textInput(['class'=>'input'])->label('') ?>
                <?= Html::submitButton('Поиск задачи',['class' => 'btn']) ?>
                <?php ActiveForm::end(); ?>


            <?php
            foreach ($tasks  as $task) { ?>
                <ul class="list-group">
                    <li class="list-group-item active">
                        <h2><?=$task['name']?></h2>
                        <p>Статус задачи: <?=$task['status']?> Тип Задачи:<?=$task['type']?></p>
                        <p><b>Description: <?=$task['description']?></b></p>
                        <p><b>Start date:</b> <?=Yii::$app->formatter->asDate($task['start_date'],'yyyy-MM-dd')?>
                            <b>Expire date:</b> <?=Yii::$app->formatter->asDate($task['end_date'],'yyyy-MM-dd')?></p>
                        <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['task/show','id'=>$task['id']])?>">Open task</a></p>
                        <?= Html::a('Delete task', ['delete', 'id' => $task['id']], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>
