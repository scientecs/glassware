<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\common\OrderGlass */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Glasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-glass-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_glass_status_id',
            'company_id',
            'date',
            'time',
            'is_notyfication',
            'profit_alcogol',
            'profit_bank',
            'profit_broken_glass',
            'total_profit',
            'count_alcogol',
            'count_bank',
            'weight_broken_glass',
            'user_id',
        ],
    ]) ?>

</div>
