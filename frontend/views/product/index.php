<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = 'Продукты';
?>
<div class="label-index">

    <div class="row">
        <div class="col-md-6">
            <h1>Продукты</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php if(isset($products) && !empty($products)): ?>
                <div class="row">
                    <?php foreach($products as $pr): ?>
                        <div class="col-md-3 text-center" style="margin-bottom:20px;">
                            <div style="vertical-align:bottom; height:200px; background-color:#adb5bd;">

                                <!-- добавлено отображение привязанной акции с ярлыком -->
                                <div style="<?=(isset($pr['color_bg']) ? 'background-color:'.$pr['color_bg'].';' : '')?> <?=(isset($pr['color_text']) ? 'color:'.$pr['color_text'].';' : '')?> margin:0 0 0 15px; padding:3px 8px; position:absolute; left:0; top:0;"><?=(isset($pr['label_name']) ? $pr['label_name'] : '')?></div>

                                <div style="padding:100px 0 0 0;">
                                    ID: <?=$pr['id']?> <br/>
                                    Артикул: <?=(isset($pr['code']) && !empty($pr['code']) ? $pr['code'] : 'Нет')?> <br/>

                                    <a href="/product/view/<?=$pr['id']?>"><?=$pr['name']?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div>Нет товаров</div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(isset($all_pages) && $all_pages > 1): ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="pagination">

                    <!-- previous page -->
                    <?php if (isset($page) && ($page-1) > 0): ?>
                        <li class="prev"><a href="/product/<?=($page-1)?>" data-page="<?=($page-1)?>">«</a></li>
                    <?php else: ?>
                        <li class="prev disabled"><span>«</span></li>
                    <?php endif; ?>

                    <?php if (isset($page) && ($page - 3) > 0): ?>
                        <li><a href="/product/<?=($page-3)?>" data-page="<?=($page-3)?>"><?=($page-3)?></a></li>
                    <?php endif; ?>

                    <?php if (isset($page) && ($page - 2) > 0): ?>
                        <li><a href="/product/<?=($page-2)?>" data-page="<?=($page-2)?>"><?=($page-2)?></a></li>
                    <?php endif; ?>

                    <?php if (isset($page) && ($page - 1) > 0): ?>
                        <li><a href="/product/<?=($page-1)?>" data-page="<?=($page-1)?>"><?=($page-1)?></a></li>
                    <?php endif; ?>

                    <!-- active page-->
                    <?php if (isset($page) && !empty($page) ): ?>
                        <li class="active"><a href="/product/<?=$page?>" data-page="<?=$page?>"><?=$page?></a></li>
                    <?php endif; ?>

                    <?php if (isset($page) && ($page+1) > 0 && ($page+1) <= $all_pages): ?>
                        <li><a href="/product/<?=($page+1)?>" data-page="<?=($page+1)?>"><?=($page+1)?></a></li>
                    <?php endif; ?>

                    <?php if (isset($page) && ($page+2) > 0 && ($page+2) <= $all_pages): ?>
                        <li><a href="/product/<?=($page+2)?>" data-page="<?=($page+2)?>"><?=($page+2)?></a></li>
                    <?php endif; ?>

                    <?php if (isset($page) && ($page+3) > 0 && ($page+3) <= $all_pages): ?>
                        <li><a href="/product/<?=($page+3)?>" data-page="<?=($page+3)?>"><?=($page+3)?></a></li>
                    <?php endif; ?>

                    <!-- next page -->
                    <?php if (isset($page) && ($page+1) > 0 && ($page+1) <= $all_pages): ?>
                        <li class="next"><a href="/product/<?=($page+1)?>" data-page="<?=($page+1)?>">»</a></li>
                    <?php else: ?>
                        <li class="next disabled"><span>»</span></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

</div>