<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\common\Company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Панель', 'url' => ['/admin/default']];
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить эту компанию?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'skype',
            'email:email',
            'phone',
            'latitude',
            'longtitude',
            'address',
            'schedule',
            'icon',
        ],
    ])
    ?>
    <?php if ($model->image) { ?>
        <?= Html::tag('div', 'Иконка :') ?>
        <?= Html::img('@web/' . $model->image, ['width' => 100, 'height' => 100]) ?>
    <?php } ?>


</div>
