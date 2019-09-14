<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => 'Список продуктов', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Продукт - ' . $model->name;
?>
<div class="label-view">

    <h1>Продукт - <?= Html::encode($model->name) ?></h1>

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

</div>