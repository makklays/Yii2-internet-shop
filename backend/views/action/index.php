<?php

use yii\grid\GridView;
use yii\helpers\Html;

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'headerOptions' => ['style' => 'text-align:center; width:45px;'],
            'contentOptions' => ['style' => 'text-align:center;'],
        ],
        //'id',
        [
            'attribute' => 'id',
            'headerOptions'  => ['style' => 'text-align:center;'],
            'contentOptions' => ['style' => 'text-align:center; width:100px; max-width:100px; min-width:100px;'],
            'value' => 'id',
        ],
        'name',
        'label_id',
        'pic',
        'from_date',
        'to_date',
        [
            'format' => 'raw',
            'attribute' => 'is_active',
            'value' => function($dataProvider) {
                return Html::decode(Html::decode($dataProvider->is_active == 1 ? '<span style="color:green;">Да</span>' : '<span class="not-set">Нет</span>'));
            },
            'headerOptions' => ['style' => 'width:110px;'],
        ],
        [
            'format' => 'raw',
            'attribute' => 'is_delete',
            'value' => function($dataProvider) {
                return Html::decode(Html::decode($dataProvider->is_delete == 1 ? '<span style="color:green;">Да</span>' : '<span class="not-set">Нет</span>'));
            },
            'headerOptions' => ['style' => 'width:110px;'],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Action', // заголовок столбца
            'headerOptions' => ['style' => 'text-align:center; width:90px;'],
            'contentOptions' => ['style' => 'text-align:center;'],
        ],
    ],
]); ?>