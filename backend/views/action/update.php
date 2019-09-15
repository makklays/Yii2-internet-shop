<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\jui\DatePicker;
use kartik\date\DatePicker;

$this->params['breadcrumbs'][] = ['label' => 'Список акций', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактировать акцию';
?>
<div class="label-create">

    <h1>Редактировать акцию</h1>

    <?php $form = ActiveForm::begin([
        //'action' => ['update'],
        //'method' => 'post',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

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
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>
            <!--small class="" style="font-size:12px;">Example invalid custom file feedback</small-->
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'to_date')->widget( DatePicker::classname(), [
                'options' => ['placeholder' => 'Дата завершения ...'],
                'language' => 'ru',
                'type' => DatePicker::TYPE_COMPONENT_APPEND, // расположение иконки клендаря
                //'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>
            <!-- ->textInput(['class' => 'form-control']); ?> -->
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
                <!--label class="custom-file-label" for="customFileLang">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div-->
            </div>
            <?php if(isset($model->pic) && !empty($model->pic)): ?>
                <img src="/uploads/pics/<?=$model->id?>/<?=$model->pic?>" alt="<?=$model->pic?>" title="<?=$model->pic?>" style="width:120px;" />
            <?php else: ?>
                <span>нет изображения</span>
            <?php endif; ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- label-create -->
