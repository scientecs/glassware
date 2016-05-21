<?php

use yii\helpers\Url;
?>

<div class="admin-default-index">
    <ul>
        <li><a href="<?php echo Url::to(['article/index']); ?>">Статьи</a></li>
        <li><a href="<?php echo Url::to(['product/index']); ?>">Товар</a></li>
        <li><a href="<?php echo Url::to(['product-category/index']); ?>">Категории товара</a></li>
    </ul>
</div>