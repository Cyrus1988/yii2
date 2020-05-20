<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;

?>

<h1>Создание задачи</h1>

<?php
//\app\controllers\debug($model);
//?>
<?php if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('success')?>
    </div>
<?php endif ?>

<?php if(Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('error')?>
    </div>
<?php endif ?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model,'name')?>


<?= $form->field($model, 'type')->dropdownList([
    'Task'=>'Task',
    'Bug'=>'Bug',
], ['prompt' => [
    'text' => 'Выберите тип задачи',
    'options'=> ['disabled' => true, 'selected' => true]]]) ?>


<?= $form->field($model, 'status')->dropdownList([
    'В работе'=>'В работе',
    'Выполнено'=>'Выполнено',
    'Готова к тестированию'=>'Готова к тестированию'
], ['prompt' => [
    'text' => 'Выберите статус задачи',
    'options'=> ['disabled' => true, 'selected' => true]]]) ?>


<?= $form->field($model,'description')->textarea(['rows'=>4])?>

<?= $form->field($model,'start_date')->widget(DatePicker::className(),['clientOptions' => ['dateFormat' => 'Y-m-d']]) ?>

<?= $form->field($model,'end_date')->widget(DatePicker::className(),['clientOptions' => ['dateFormat' => 'Y-m-d']]) ?>


<?= Html::submitButton('Создать задачу',['class' => 'btn']) ?>
<?php ActiveForm::end(); ?>

