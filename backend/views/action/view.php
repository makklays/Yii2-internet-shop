<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => 'Список акций', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Акция - ' . $model->name;
?>
<div class="label-view">

    <h1>Акция - <?= Html::encode($model->name) ?></h1>

    <p></p>
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <br/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'name',
            //'description',
            //'pic',
            [
                'format' => 'raw',
                'attribute' => 'label_id',
                'value' => function($dp){
                    return Html::a(
                        $dp->label->name,
                        ['label/view', 'id' => $dp->label_id],
                        [
                            'title' => $dp->label_id .'-'.$dp->label->name,
                            //'target' => '_blank'
                        ]
                    );
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'Вид',
                'value' => function($dp){
                    return '<div style="height:20px; color:'.$dp->label->color_text.'; background-color:'.$dp->label->color_bg.';" >'.$dp->label->name.'</div>';
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'pic',
                'value' => function($dp){
                    if (isset($dp->pic) && !empty($dp->pic)) {
                        return '<img src="/uploads/pics/'.$dp->id.'/'.$dp->pic.'" alt="'.$dp->pic.'" style="width:120px;" />';
                    } else {
                        return '<i style="color:#adb5bd;">отсутствует</i>';
                    }
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'файл',
                'value' => function($dp) {
                    return $dp->pic;
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'is_active',
                'value' => function($dp){
                    return $dp->is_active ? '<span style="color:green;">Да</span>' : '<span class="set-not">Нет</span>';
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'from_date',
                'value' => function($dp){
                    return $dp->from_date; // date('d/m/Y',
                }
            ],
            //'to_date',
            [
                'format' => 'raw',
                'attribute' => 'to_date',
                'value' => function($dp){
                    return $dp->to_date;  // date('d/m/Y',
                }
            ],
        ],
    ]) ?>

    <div class="row">
        <div class="col-md-12">
            <b>Описание акции</b>
        </div>
        <div class="col-md-12">
            <?=nl2br($model->description)?>
        </div>
        <div class="col-md-12">
            <div style="border-bottom: 1px dashed #cbcbca; margin: 20px 0;"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div><h3>Список прикрепленных товаров к акции:</h3></div>
        </div>
    </div>

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
            /*[
                'attribute' => 'id',
                'headerOptions'  => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center; width:100px; max-width:100px; min-width:100px;'],
                'value' => 'id',
            ],*/
            //'product_id',
            [
                'format' => 'raw',
                'attribute' => 'product_id',
                'header' => 'Продукт',
                'value' => function($dp) {

                    if (isset($dp->product) && !empty($dp->product->name) && $dp->product->is_active == 1) {
                        return Html::a(
                            $dp->product->name,
                            Url::to(['/product/view', 'id' => $dp->product->id]),
                            [
                                'title' => 'ID:'.$dp->product_id .' - '.$dp->product->name,
                                //'target' => '_blank'
                            ]
                        );
                    } elseif (isset($dp->product) && !empty($dp->product->name) && $dp->product->is_active == 0) {
                        return Html::a(
                            $dp->product->name,
                            Url::to(['/product/view', 'id' => $dp->product->id]),
                            [
                                'title' => 'ID:'.$dp->product_id .' - '.$dp->product->name,
                                'style' => 'color: grey;'
                            ]
                        );
                    } else {
                        return '<i style="color:grey;">нет продуктов</i>';
                    }
                },
                'headerOptions' => ['style' => ' text-align:left; '],
                'contentOptions' => ['style' => 'text-align:left; '],
            ],
            //'action_id',
            [
                'format' => 'raw',
                'attribute' => 'action_id',
                'header' => 'Акция',
                'value' => function($dp) {
                    if (isset($dp->action) && !empty($dp->action->name)) {
                        return $dp->action->name;
                    } else {
                        return '<i style="color:grey;">нет акции</i>';
                    }
                },
                'headerOptions' => ['style' => 'width:110px; text-align:center; '],
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
            [
                'format' => 'raw',
                'attribute' => 'Акция идет?',
                'value' => function($dataProvider) {
                    return ($dataProvider->action->from_date <= date('Y-m-d H:i:s') && date('Y-m-d H:i:s') <= $dataProvider->action->to_date ? '<span style="color:green;">Да</span>' : '<span class="not-set">Нет</span>');
                },
                'headerOptions' => ['style' => 'text-align:center; width:110px;'],
                'contentOptions' => ['style' => 'text-align:center; '],
            ],
            //'created_at:datetime',
            //'modified_at:datetime',
            //'modified_at',
            [
                'format' => 'raw',
                'attribute' => 'modified_at',
                'value' => function($dp) {
                    return date('d/m/Y H:i:s', strtotime($dp->modified_at));
                },
                'headerOptions' => ['style' => 'text-align:center; width:110px;'],
                'contentOptions' => ['style' => 'text-align:center; '],
            ],
            /*[
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия', // заголовок столбца
                'headerOptions' => ['style' => 'text-align:center; width:90px;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],*/
        ],
    ]); ?>

</div>