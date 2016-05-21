<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\multiselect\MultiSelect;

/* @var $this yii\web\View */
/* @var $model app\common\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= Html::tag('div', '<b>Категории товаров</b>') ?>
    <?=
    MultiSelect::widget([
        'model' => $model,
        'attribute' => 'productCategories',
        "options" => ['multiple' => "multiple"],
        'data' => ['Категории' => $productCategories]
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 10]) ?>

    <?php if ($this->context->action->id === 'update' && $model->image) { ?>
        <?= Html::img('@web/' . $model->image, ['class' => 'pull-center img-responsive']) ?>
    <?php } ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
