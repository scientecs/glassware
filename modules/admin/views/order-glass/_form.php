<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\common\OrderGlass */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-glass-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_glass_status_id')->textInput() ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_notyfication')->textInput() ?>

    <?= $form->field($model, 'profit_alcogol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profit_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profit_broken_glass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_profit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count_alcogol')->textInput() ?>

    <?= $form->field($model, 'count_bank')->textInput() ?>

    <?= $form->field($model, 'weight_broken_glass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
