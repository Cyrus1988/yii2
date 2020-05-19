<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;

?>

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


<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
<!--        <div class="col-md-4">-->
<!--            <img src="..." class="card-img" alt="...">-->
<!--        </div>-->
        <div class="col-md-8">
            <div class="card-body">

                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($task,'name')?>
                <?= $form->field($task,'type')?>
                <?= $form->field($task,'status')?>
                <?= $form->field($task,'description')->textarea(['rows'=>4])?>
                <?= $form->field($task,'start_date')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2014-01-01']]) ?>

                <?= $form->field($task,'end_date')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2014-01-01']]) ?>


                <?= Html::submitButton('Обновить задачу',['class' => 'btn']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>