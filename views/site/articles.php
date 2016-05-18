<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Блог';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="articles">
    <?php foreach ($models as $model) { ?>
        <div class="title"><?= $model->title; ?></div>
        <?php echo Html::img('@web' . '/' . $model->image, ['class' => 'pull-center img-responsive']); ?>
        <p class="description"><?= $model->short_description; ?></p>
        <span>
            <?= Html::a('Читать далее...', Url::to(['site/blog', 'slug' => $model->slug]), ['class' => 'btn btn-primary']) ?>
            <span class="published-date"><?= $model->published_date; ?></span>
        </span>
    <?php } ?>

    <?php
    echo LinkPager::widget([
        'pagination' => $pagination,
    ]);
    ?>
</div>