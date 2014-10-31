<?php
/* @var $this yii\web\View */
$this->title = 'Shop';
?>
<div class="site-index">
    <div class="categories_list">
        <h2>Categories</h2>
        <?php foreach($categories as $k=>$v){?>
            <a href="index.php?r=shop/category&id=<?=$v['category_id']?>"><?=$v['category_name'];?>(<? if(is_null($v['prc'])){ echo '0';} else echo $v['prc'];?>)</a>
            <?='<br/>';
            }?>
    </div>
    <div class="most_commented">
        <h2>Most commented product:</h2>
        <a href="index.php?r=shop/commented&id=<?=$most_commented['product_id']?>">
            <?=$most_commented['name']?>
        </a>
    </div>
    <div class="Brands">
        <a href="index.php?r=shop/brands">
            <h2>Brands</h2>
        </a>
    </div>
</div>
