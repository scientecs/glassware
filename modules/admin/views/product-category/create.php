<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\common\ProductCategory */

$this->title = 'Создать категорию товара';
$this->params['breadcrumbs'][] = ['label' => 'Админ панель', 'url' => ['/admin/default']];
$this->params['breadcrumbs'][] = ['label' => 'Категория товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
