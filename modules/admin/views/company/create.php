<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\common\Company */

$this->title = 'Создать компанию';
$this->params['breadcrumbs'][] = ['label' => 'Панель', 'url' => ['/admin/default']];
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
