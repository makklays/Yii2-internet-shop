<?php
use yii\grid\GridView;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = 'Список ярлыков';
?>
<div class="label-index">

    <div class="row">
        <div class="col-md-6">
            <h1 style="margin:0;">Список ярлыков</h1>
        </div>
        <div class="col-md-6" style="margin:5px 0 0 0 ;">
            <?= Html::a('Добавить ярлык', ['create'], ['class' => 'btn btn-success']) ?>
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
        'name',
        [
            'format' => 'raw',
            'attribute' => 'Вид',
            'value' => function($dp) {
                return '<div style="padding:0 0 0 5px; height:20px; color:'.$dp->color_text.'; background-color:'.$dp->color_bg.';" >'.$dp->name.'</div>';
            },
            'headerOptions' => ['style' => 'width:200px; text-align:center;'],
            'contentOptions' => ['style' => 'text-align:left;'],
        ],
        //'color_bg',
        [
            'format' => 'raw',
            'attribute' => 'color_bg',
            'value' => function($dataProvider) {
                return Html::decode('<div style="height:20px; background-color: '.$dataProvider->color_bg.';" > '.$dataProvider->color_bg.' </div>');
            },
            'headerOptions' => ['style' => 'width:110px; text-align:center;'],
            'contentOptions' => ['style' => 'text-align:center;'],
        ],
        //'color_text',
        [
            'format' => 'raw',
            'attribute' => 'color_text',
            'value' => function($dataProvider) {
                return Html::decode('<div style="height:20px; background-color: '.$dataProvider->color_text.';" > '.$dataProvider->color_text.' </div>');
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