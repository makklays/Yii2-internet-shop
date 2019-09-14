<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = 'Продуктов';
?>
<div class="label-index">

    <div class="row">
        <div class="col-md-6">
            <h1 style="margin:0;">Продукты</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php if(isset($products) && !empty($products)): ?>
                <div class="row">
                    <?php foreach($products as $pr): ?>
                        <div class="col-md-3 text-center" style="margin-bottom:20px;">
                            <div style="vertical-align:bottom; height:200px; background-color:#adb5bd;">
                                <div style="background-color:red; margin:0 0 0 15px; padding:3px 8px; position:absolute; left:0; top:0;">Actions</div>
                                <div style="padding:100px 0 0 0;"><?=$pr->name?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div>Нет товаров</div>
            <?php endif; ?>
        </div>
    </div>

</div>