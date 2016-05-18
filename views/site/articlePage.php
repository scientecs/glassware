<?php

use yii\helpers\Html;

$this->title = 'Блог';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['blog']];
$this->params['breadcrumbs'][] = $article->title;
?>

<div class="articles">
    <div class="title"><?= $article->title; ?></div>
    <?php echo Html::img('@web' . '/' . $article->image, ['class' => 'pull-center img-responsive']); ?>
    <p class="description"><?= $article->description; ?></p>
    <span>
        <span class="published-date"><?= $article->published_date; ?></span>
    </span>
</div>