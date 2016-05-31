<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\common\Setting;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Сообщение отправлено
        </div>

    <?php else: ?>
        <p>
            Если у Вас есть вопросы свяжитесь с нами.
            Спасибо.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput() ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                <?=
                $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ])
                ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-lg-7">
                <span><b>Skype :</b></span>
                <?php echo Setting::getValueByKey('company_skype'); ?>
                <p><b>Email :</b>
                    <?php echo Setting::getValueByKey('company_email'); ?>
                </p>
                <h2>Где мы есть?</h2>
                <?php foreach ($departments as $department) { ?>
                    <div><h4><b><?= $department['adress']; ?></b></h4></div>
                    <b>График</b></h4>
                    <p><?= $department['schedule']; ?></p>
                    <b>Телефоны</b>
                    <p><?= $department['phone']; ?></p>
                <?php } ?>  
            </div>
        </div>

    <?php endif; ?>
</div>
