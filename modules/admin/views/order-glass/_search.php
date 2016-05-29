<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrderGlassSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-glass-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_glass_status_id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'is_notyfication') ?>

    <?php // echo $form->field($model, 'profit_alcogol') ?>

    <?php // echo $form->field($model, 'profit_bank') ?>

    <?php // echo $form->field($model, 'profit_broken_glass') ?>

    <?php // echo $form->field($model, 'total_profit') ?>

    <?php // echo $form->field($model, 'count_alcogol') ?>

    <?php // echo $form->field($model, 'count_bank') ?>

    <?php // echo $form->field($model, 'weight_broken_glass') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
