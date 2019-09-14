<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = 'Список продуктов';
?>
<div class="label-index">

    <div class="row">
        <div class="col-md-6">
            <h1 style="margin:0;">Список продуктов</h1>
        </div>
        <div class="col-md-6" style="margin:5px 0 0 0 ;">
            <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
            [
                'format' => 'raw',
                'attribute' => 'code',
                'value' => function($dp) {
                    if (isset($dp->code) && !empty($dp->code)) {
                        return Html::decode($dp->code);
                    } else {
                        return '-';
                    }
                },
                'headerOptions' => ['style' => 'width:110px; text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            //'name',
            [
                'format' => 'raw',
                'attribute' => 'name',
                'value' => function($dp) {
                    return Html::a(
                        $dp->name,
                        Url::to(['/product/view', 'id' => $dp->id]),
                        [
                            'title' => 'Детальнее',
                            //'target' => '_blank'
                        ]
                    );
                },
            ],
            [
                'format' => 'raw',
                'attribute' => 'weight',
                'value' => function($dataProvider) {
                    return Html::decode($dataProvider->weight);
                },
                'headerOptions' => ['style' => 'width:110px; text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'format' => 'raw',
                'attribute' => 'is_active',
                'value' => function($dataProvider) {
                    return Html::decode($dataProvider->is_active == 1 ? '<span style="color:green;">Да</span>' : '<span class="not-set">Нет</span>');
                },
                'headerOptions' => ['style' => 'width:110px; text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
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