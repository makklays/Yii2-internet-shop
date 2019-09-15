<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Список ярлыков', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактировать ярлык';
?>
<div class="label-update">

    <h1>Редактировать ярлык</h1>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name') ?>

            <?= $form->field($model, 'color_bg') ?>

            <?= $form->field($model, 'color_text') ?>

            <?= $form->field($model, 'is_active')->dropDownList([
                '1' => 'Да',
                '0' => 'Нет',
            ]) ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::a('Отменить', Url::to(['/label/']), ['style' => 'margin:0 30px 0 0;']) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- label-create -->
