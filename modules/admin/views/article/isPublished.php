<?php

if ($model->is_published == 1) {
    $model->is_published = 'Да';
} else {
    $model->is_published = 'Нет';
}
?>
