<?php
/* @var $this yii\web\View */
$this->title = 'Brands';
?>
<div class="site-index">
    <div class="Brands_list">
        <h2>Brands</h2>
        <?php foreach($brands as $k=>$v){?>
            <?=$v['brand_name'];?>(<? if(is_null($v['comments_count'])){ echo '0';} else echo $v['comments_count'];?>)</a>
            <?='<br/>';
        }?>
    </div>
</div>