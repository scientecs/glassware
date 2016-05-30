<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\common\Setting */

$this->title = 'Создать настройку';
$this->params['breadcrumbs'][] = ['label' => 'Админ панель', 'url' => ['/admin/default']];
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
