<?php


use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';

$this->registerJsFile(
    '@web/js/deleteTask.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);


?>

<?php
Pjax::begin([
    'id' => 'my_pjax'
]);
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
                    return Html::a('<span class="glyphicon glyphicon-folder-open"></span>', $url);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', true, [
                        'class' => 'pjax-delete-link',
                        'delete-url' => $url,
                        'pjax-container' => 'my_pjax',
                        'title' => Yii::t('yii', 'Delete')
                    ]);
                }
            ]
        ]
    ],
]);
Pjax::end();
?>


