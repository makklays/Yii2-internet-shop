<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Список акций', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить акцию';
?>
<div class="label-create">

    <h1>Добавить акцию</h1>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'label_id')->dropDownList(
                    $labels,
                    [
                        /*'prompt' => 'Select',*/
                        'multiple' => false,
                        //'style' => 'height:150px; ',
                        //'class'=>'chosen-select input-md required',
                        //'selected' => 'selected'
                    ]) ?>
            </div>
            <div class="col-md-4">
                <!--
                <?= $form->field($model, 'from_date')->textInput(['class' => 'form-control']); ?>
                -->

                <?= $form->field($model, 'from_date')->widget( DatePicker::classname(), [
                    'options' => ['placeholder' => 'Дата начала ...'],
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                    ]
                ]); ?>
            </div>
            <div class="col-md-4">
                <!--
                <?= $form->field($model, 'to_date')->textInput(['class' => 'form-control']); ?>
                -->

                <?= $form->field($model, 'to_date')->widget( DatePicker::classname(), [
                    'options' => ['placeholder' => 'Дата завершения ...'],
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                    ]
                ]); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'name') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'is_active')->dropDownList([
                    '1' => 'Да',
                    '0' => 'Нет',
                ]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="custom-file">
                    <?= $form->field($model, 'pic')->fileInput([/*'multiple' => true,*/ 'accept' => 'image/*', 'id' => 'customFileLang', 'class' => 'custom-file-input']) ?>
                </div>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'description')->textarea(['rows' => 6]); ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- label-create -->
