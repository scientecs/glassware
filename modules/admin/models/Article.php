<?php

/**
 * Atricle model
 *
 * PHP version 5.5
 *
 * @package    app\modules\admin\models
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use app\models\LoadFile;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $short_description
 * @property string $description
 * @property string $published_date
 * @property string $slug
 * @property string $image
 * @property integer is_published
 */
class Article extends ActiveRecord
{

    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'short_description', 'description', 'slug'], 'required'],
            [['short_description', 'description'], 'string'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['is_published'], 'boolean'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'short_description' => 'Краткое описание',
            'description' => 'Описание',
            'published_date' => 'Дата публикации',
            'slug' => 'Slug',
            'image' => 'Изображение',
            'is_published' => 'Опубликовать?'
        ];
    }

    /**
     * @inheritdoc
     */
    public function save($runValidation = true, $attributeNames = null)
    {
        if (UploadedFile::getInstance($this, 'file')) {
            LoadFile::saveImage($this, UploadedFile::getInstance($this, 'file'));
        }

        if ($this->is_published == 1) {
            $this->published_date = date('Y-m-d');
        } else {
            $this->published_date = null;
        }

        return parent::save($runValidation, $attributeNames);
    }

}
