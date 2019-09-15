<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => 'Список продуктов', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Продукт - ' . $model->name;
?>
<div class="label-view">

    <h1 style="<?=($model->is_active == 1 ? 'color:#000;' : 'color:#DDD;')?>" >Продукт - <?= Html::encode($model->name) ?></h1>

    <p></p>
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <br/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            /*[
                'format' => 'raw',
                'attribute' => 'Вид',
                'value' => function($dp){
                    return '<div style="height:20px; color:'.$dp->color_text.'; background-color:'.$dp->color_bg.';" >'.$dp->name.'</div>';
                }
            ],*/
            //'color_bg',
            [
                'format' => 'raw',
                'attribute' => 'code',
                'value' => function($dp){
                    return (isset($dp->code) && !empty($dp->code) ? $dp->code : '-');
                }
            ],
            //'color_text',
            [
                'format' => 'raw',
                'attribute' => 'weight',
                'value' => function($dp){
                    return (isset($dp->weight) && !empty($dp->weight) ? $dp->weight : '-');
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'is_active',
                'value' => function($dp){
                    return $dp->is_active ? '<span style="color:green;">Да</span>' : '<span style="color:red;">Нет</span>';
                }
            ],

            //'created_at:datetime',
            //'modified_at:datetime',
            //'is_active',
        ],
    ]) ?>

    <div class="row">
        <div class="col-md-12">
            <div><h3>Список прикрепленных акций к товару:</h3></div>
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
            //'action_id',
            [
                'format' => 'raw',
                'attribute' => 'action_id',
                'header' => 'Акция',
                'value' => function($dp) {

                    if (isset($dp->action) && !empty($dp->action->name)) {
                        return Html::a(
                            $dp->action->name,
                            Url::to(['/action/view', 'id' => $dp->action->id]),
                            [
                                'title' => 'ID:'.$dp->action_id .' - '.$dp->action->name,
                                //'target' => '_blank'
                            ]
                        );
                    } else {
                        return '<i style="color:grey;">нет акции</i>';
                    }
                },
                'headerOptions' => ['style' => ' text-align:left; '],
                'contentOptions' => ['style' => 'text-align:left; '],
            ],
            //'product_id',
            [
                'format' => 'raw',
                'attribute' => 'product_id',
                'header' => 'Продукт',
                'value' => function($dp) {
                    if (isset($dp->product) && !empty($dp->product->name)) {
                        return $dp->product->name;
                    } else {
                        return '<i style="color:grey;">нет продуктов</i>';
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