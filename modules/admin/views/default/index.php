<?php

use yii\helpers\Url;
?>

<div class="admin-default-index">
    <ul>
        <li><a href="<?php echo Url::to(['article/index']); ?>">Статьи</a></li>
        <li><a href="<?php echo Url::to(['product/index']); ?>">Товар</a></li>
        <li><a href="<?php echo Url::to(['product-category/index']); ?>">Категории товара</a></li>
        <li><a href="<?php echo Url::to(['company/index']); ?>">Компании</a></li>
        <li><a href="<?php echo Url::to(['order-glass-status/index']); ?>">Статус заказа</a></li>
        <li><a href="<?php echo Url::to(['order-glass/index']); ?>">Заказы</a></li>
    </ul>
</div>