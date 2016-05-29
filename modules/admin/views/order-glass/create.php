<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\common\OrderGlass */

$this->title = 'Create Order Glass';
$this->params['breadcrumbs'][] = ['label' => 'Order Glasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-glass-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
