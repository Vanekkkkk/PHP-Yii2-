<?php
/* @var $this yii\web\View */
$this->title = $product['name'];
?>
<div class="product">
    <div class="product_name">
        <h2><?=$product['name']?></h2>
    </div>
    <div class="product_price">
        <h3>Price:<?=$product['price']?>$</h3>
    </div>
    <div class="product_img">
        <?
        foreach($images as $k=>$v){?>
            <img width="200" height="200" src="images<?=$v['image_path']?>">
        <?}?>
    </div>
    <div class="product_description">
        <h4><?=$product['description']?></h4>
    </div>
    <br><br><br><br>
    <div class="comments"><h2>Comments:</h2><br>
        <? foreach($comments as $k=>$v){ ?>
            <div class="user"><?=$v['user_name']?></div><br>
            <div class="comment"><?=$v['comment_text']?></div><br/>
        <?}?>
    </div>
</div>