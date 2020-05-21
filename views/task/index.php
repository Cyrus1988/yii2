<?php

/* @var $this yii\web\View */

use app\models\TaskSearch;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'My Yii Application';

//$model = new TaskSearch();

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        'type',
        'status',
        'start_date:date',
        'end_date:date',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{show} {delete}',
            'buttons' => [
                'show' => function ($url) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-folder-open"></span>',
                        $url);
                },
            ]
        ]
    ],
]);

?>

