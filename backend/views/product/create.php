<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Список продуктов', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить продукт';
?>
<div class="label-create">

    <h1>Добавить продукт</h1>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name') ?>

            <?= $form->field($model, 'code') ?>

            <?= $form->field($model, 'weight') ?>

            <?= $form->field($model, 'is_active')->dropDownList([
                '1' => 'Да',
                '0' => 'Нет',
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::a('Отменить', Url::to(['/product/']), ['style' => 'margin:0 30px 0 0;']) ?>
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- label-create -->
