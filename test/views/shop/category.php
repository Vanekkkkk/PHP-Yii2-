<?php
/* @var $this yii\web\View */
$this->title = $products[0]['category_name'];
?>
<div class="site-index">
<?
    foreach($products as $k=>$v){?>
        <div class="product">
            <div class="product_name">
                <a href="index.php?r=shop/product&id=<?=$v['product_id']?>"><?=$v['name']?></a>
            </div>
            <div class="product_price">
                Цена: <?=$v['price']?> грн.
            </div>
            <div class="product_img">
                <img width="200" height="200" src="images<?=$v['image_path']?>">
            </div>
            <div class="product_description">
                <?=$v['description']?>
            </div>
        </div>
    <?}?>






</div>