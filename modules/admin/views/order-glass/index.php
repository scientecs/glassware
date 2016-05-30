<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OrderGlassSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Glasses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-glass-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order Glass', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_glass_status_id',
            'department_id',
            'date',
            'time',
            // 'is_notyfication',
            // 'profit_alcogol',
            // 'profit_bank',
            // 'profit_broken_glass',
            // 'total_profit',
            // 'count_alcogol',
            // 'count_bank',
            // 'weight_broken_glass',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
