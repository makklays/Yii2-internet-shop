<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['product/']];
$this->params['breadcrumbs'][] = 'Продукт - ' . $model->name;
?>
<div class="label-index">

    <div class="row">
        <div class="col-md-12">
            <h1>Продукт - <?=$model->name?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <br/><br/>
            ID: <?=$model->id?> <br/><br/>
            Артикул: <?=(isset($model->code) && !empty($model->code) ? $model->code : '-')?> <br/><br/>
            Вес: <?=(isset($model->weight) && !empty($model->weight) ? $model->weight : '-')?> <br/><br/>
            Активен: <?=(isset($model->is_active) && !empty($model->is_active) && $model->is_active == 1 ? '<span style="color:green;">Да</span>' : '<span style="color:red;">Нет</span>')?> <br/><br/>
        </div>
    </div>

</div>