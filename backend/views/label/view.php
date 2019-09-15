<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => 'Список ярлыков', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Ярлык - ' . $model->name;
?>
<div class="label-view">

    <h1>Ярлык - <?= Html::encode($model->name) ?></h1>

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
            [
                'format' => 'raw',
                'attribute' => 'Вид',
                'value' => function($dp){
                    return '<div style="height:20px; color:'.$dp->color_text.'; background-color:'.$dp->color_bg.';" >'.$dp->name.'</div>';
                }
            ],
            //'color_bg',
            [
                'format' => 'raw',
                'attribute' => 'color_bg',
                'value' => function($dp){
                    return '<div style="height:20px; background-color: '.$dp->color_bg.';" ></div>';
                }
            ],
            //'color_text',
            [
                'format' => 'raw',
                'attribute' => 'color_text',
                'value' => function($dp){
                    return '<div style="height:20px; background-color: '.$dp->color_text.';" ></div>';
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