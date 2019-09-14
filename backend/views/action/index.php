<?php

use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = 'Список акций';
?>

<div class="label-index">

    <div class="row">
        <div class="col-md-6">
            <h1 style="margin:0;">Список акций</h1>
        </div>
        <div class="col-md-6" style="margin:5px 0 0 0 ;">
            <?= Html::a('Добавить акцию', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br/>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'layout' => "{summary}\n{items}\n{pager}",
    'summary' => "Показано {begin} - {end} из {totalCount}",
    'columns' => [
        /*[
            'class' => 'yii\grid\SerialColumn',
            'headerOptions' => ['style' => 'text-align:center; width:45px;'],
            'contentOptions' => ['style' => 'text-align:center;'],
        ],*/
        //'id',
        [
            'attribute' => 'id',
            'headerOptions'  => ['style' => 'text-align:center;'],
            'contentOptions' => ['style' => 'text-align:center; width:100px; max-width:100px; min-width:100px;'],
            'value' => 'id',
        ],
        //'name',
        [
            'format' => 'raw',
            'attribute' => 'name',
            'value' => function($dp) {
                return Html::a(
                    $dp->name,
                    Url::to(['/action/view', 'id' => $dp->id]),
                    [
                        'title' => $dp->name,
                        //'target' => '_blank'
                    ]
                );
            },
        ],
        //'label_id',
        [
            'format' => 'raw',
            'attribute' => 'label_id',
            'value' => function($dp) {

                if (isset($dp->label) && !empty($dp->label->name)) {
                    return Html::a(
                            $dp->label->name,
                            Url::to(['/label/view', 'id' => $dp->id]),
                            [
                                'title' => $dp->label_id .'-'.$dp->label->name,
                                //'target' => '_blank'
                            ]
                        );
                } else {
                    return '<i style="color:grey;">нет ярлыка</i>';
                }
                //return Html::decode('<a href="/label/view/?id='.$dataProvider->label_id.'">'.$dataProvider->getLabels().'</a>');
            },
            'headerOptions' => ['style' => 'width:110px;'],
        ],
        [
            'format' => 'raw',
            'attribute' => 'Вид',
            'value' => function($dp) {

                if (isset($dp->label) && !empty($dp->label->name)) {
                    return '<div style="height:20px; color:'.$dp->label->color_text.'; background-color:'.$dp->label->color_bg.';" >'.$dp->label->name.'</div>';
                } else {
                    return '<i style="color:grey;">нет ярлыка</i>';
                }
                //return Html::decode('<a href="/label/view/?id='.$dataProvider->label_id.'">'.$dataProvider->getLabels().'</a>');
            },
            'headerOptions' => ['style' => 'width:110px; text-align:center; '],
            'contentOptions' => ['style' => 'text-align:center; '],
        ],

        //'pic',
        [
            'format' => 'raw',
            'attribute' => 'pic',
            'value' => function($dp) {
                //return Html::decode('<img src="/img/pic/'.$dataProvider->pic.'" title="'.$dataProvider->pic.'" alt="'.$dataProvider->pic.'" />');
                $url = '/uploads/pics/' . $dp->id . '/' . $dp->pic;
                if (isset($dp->pic) && !empty($dp->pic)) {
                    return Html::img($url, ['alt' => $dp->pic, 'title' => $dp->pic, 'width' => '120px' ]);
                } else {
                    return '<i style="font-size: 12px;">нет изображения</i>';
                }
            },
            'headerOptions' => ['style' => 'width:110px; text-align:center; '],
            'contentOptions' => ['style' => 'text-align:center; '],
        ],

        //'from_date',
        [
            'format' => 'raw',
            'attribute' => 'from_date',
            'value' => function($dataProvider) {
                return $dataProvider->from_date; // date('d/m/Y', strtotime(
            },
            'headerOptions' => ['style' => 'width:110px;'],
            'contentOptions' => ['style' => 'text-align:center; '],
        ],
        //'to_date',
        [
            'format' => 'raw',
            'attribute' => 'to_date',
            'value' => function($dataProvider) {
                return $dataProvider->to_date; // date('d/m/Y', strtotime(
            },
            'headerOptions' => ['style' => 'width:110px;'],
            'contentOptions' => ['style' => 'text-align:center; '],
        ],
        [
            'format' => 'raw',
            'attribute' => 'is_active',
            'value' => function($dataProvider) {
                return Html::decode($dataProvider->is_active == 1 ? '<span style="color:green;">Да</span>' : '<span class="not-set">Нет</span>');
            },
            'headerOptions' => ['style' => 'text-align:center; width:110px;'],
            'contentOptions' => ['style' => 'text-align:center; '],
        ],
        /*[
            'format' => 'raw',
            'attribute' => 'is_delete',
            'value' => function($dataProvider) {
                return Html::decode($dataProvider->is_delete == 1 ? '<span style="color:green;">Да</span>' : '<span class="not-set">Нет</span>');
            },
            'headerOptions' => ['style' => 'width:110px;'],
        ],*/
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Действия', // заголовок столбца
            'headerOptions' => ['style' => 'text-align:center; width:90px;'],
            'contentOptions' => ['style' => 'text-align:center;'],
        ],
    ],
]); ?>

</div>
