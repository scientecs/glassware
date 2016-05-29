<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\common\OrderGlassStatus */

$this->title = 'Редактировать статус заказов: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Панель', 'url' => ['/admin/default']];
$this->params['breadcrumbs'][] = ['label' => 'Статусы заказов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="order-glass-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
