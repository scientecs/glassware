<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\common\OrderGlassStatus */

$this->title = 'Создать статус заказа';
$this->params['breadcrumbs'][] = ['label' => 'Панель', 'url' => ['/admin/default']];
$this->params['breadcrumbs'][] = ['label' => 'Статусы заказов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-glass-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
