<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    $form = ActiveForm::begin([
                'id' => 'sigup-form',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
    ]);
    ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>
    <?= $form->field($model, 'email') ?>
    <?=
    $form->field($model, 'birthDay')->widget(DatePicker::classname(), [
        'language' => 'ru',
        'dateFormat' => 'dd-MM-yyyy',
    ])
    ?>
    <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>