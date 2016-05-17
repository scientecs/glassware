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
 */
class Article extends ActiveRecord
{

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
            [['title', 'short_description', 'description', 'published_date', 'slug'], 'required'],
            [['short_description', 'description'], 'string'],
            ['published_date', 'generateDate'],
            [['title', 'slug', 'image'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    public function generateDate($attribute, $params)
    {
        var_dump('Hello');
        die;
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
        ];
    }

}
