<?php
use app\models\TaskSearch;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;


$model = new TaskSearch();


?>

<?php if (!$tasks) { ?>
    <p>Ничего не найдено</p>
<?php } ?>

<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model,'name')->textInput(['class'=>'input'])->label('') ?>
            <?= Html::submitButton('Поиск задачи',['class' => 'btn']) ?>
            <?php ActiveForm::end(); ?>


            <?php foreach ($tasks  as $task) { ?>
                <ul class="list-group">
                    <li class="list-group-item active">
                        <h2><?=$task['name']?></h2>
                        <p><b>Description: <?=$task['description']?></b></p>
                        <p><b>Start date: <?=$task['start_date']?></b></p>
                        <p><b>Expire date: <?=$task['end_date']?></b></p>
                        <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['task/show','id'=>$task['id']])?>"><?=$task['name']?></a></p>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>