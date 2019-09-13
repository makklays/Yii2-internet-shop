<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Список ярлыков', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактировать ярлык';
?>
<div class="label-create">

    <h1>Редактировать ярлык</h1>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name') ?>

            <?= $form->field($model, 'color_bg') ?>

            <?= $form->field($model, 'color_text') ?>

            <?= $form->field($model, 'is_active')->dropDownList([
                '1' => 'Активный',
                '0' => 'Отключен',
            ]) ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- label-create -->
