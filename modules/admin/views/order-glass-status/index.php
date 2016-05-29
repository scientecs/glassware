<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OrderGlassStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статусы заказов';
$this->params['breadcrumbs'][] = ['label' => 'Панель', 'url' => ['/admin/default']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-glass-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Создать статус заказов', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
