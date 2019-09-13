<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Список ярлыков', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить ярлык';
?>
<div class="label-create">

    <h1>Добавить ярлык</h1>

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name') ?>

                <!-- b>Цвета фона:</b> <br/ -->
                <?= $form->field($model, 'color_bg') ?>
                <!-- /*$form->field($model, 'color_bg', [ 'template' => "{input}" ])->input('color',['class'=>"input_class"])*/ -->

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
