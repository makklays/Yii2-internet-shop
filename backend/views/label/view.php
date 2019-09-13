<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => 'Список ярлыков', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="label-view">

    <h1><?= Html::encode($model->name) ?></h1>

    <p></p>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
            'color_bg',
            'color_text',
            [
                'format' => 'raw',
                'attribute' => 'is_active',
                'value' => function($dp){
                    return $dp->is_active ? '<span style="color:green;">Да</span>' : '<span class="set-not">Нет</span>';
                }
            ],

            //'created_at:datetime',
            //'modified_at:datetime',
            //'is_active',
        ],
    ]) ?>

</div>