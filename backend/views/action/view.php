<?php
use yii\helpers\Html;
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
            //'code',
            //'from_date',

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
            //'is_active',
            //'is_delete',
            //'created_at:datetime',
            //'modified_at:datetime',
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

</div>