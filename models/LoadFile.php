<?php

/**
 * Load file class
 *
 * PHP version 5.5
 *
 * @package    app\models
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * LoadFile
 */
class LoadFile
{

    /**
     * Method for save models image
     *
     * @param mixed $model
     * @param UploadedFile $newImage
     */
    public static function saveImage($model, $newImage)
    {
        if ($model->image && $newImage) {
            self::deleteImage($model);
        }

        if ($newImage) {
            $model->image = $newImage;
            if ($model->image && $model->validate()) {
                $reflection = new \ReflectionClass($model);
                $dir = 'uploads/' . strtolower($reflection->getShortName());
                if (!is_dir($dir)) {
                    mkdir($dir);
                }
                $path = $dir . '/' . uniqid() . $model->image->baseName . '.' . $model->image->extension;
                $model->image->saveAs($path);
                $model->image = $path;
            }
        }
    }

    /**
     * Method for delete models image
     *
     * @param mixed $model
     */
    public static function deleteImage($model)
    {
        $image = Yii::getAlias('@webroot') . '/' . $model->image;

        if (file_exists($image)) {
            if (unlink($image)) {
                $model->image = null;
            }
        }
    }

}
