<?php

/**
 * Company model
 *
 * PHP version 5.5
 *
 * @package    app\common
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\common;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use app\models\LoadFile;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $skype
 * @property string $email
 * @property string $phone
 * @property string $latitude
 * @property string $longtitude
 * @property string $address
 * @property string $schedule
 * @property string $image
 *
 * @property OrderGlass[] $orderGlasses
 */
class Company extends ActiveRecord
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
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'latitude', 'longtitude', 'address', 'schedule'], 'required'],
            [['name', 'skype', 'email', 'phone', 'latitude', 'longtitude', 'address', 'schedule'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'skype' => 'Skype',
            'email' => 'Email',
            'phone' => 'Телефон',
            'latitude' => 'Шширота',
            'longtitude' => 'Долгота',
            'address' => 'Адрес',
            'schedule' => 'График',
            'image' => 'Логотип',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getOrderGlasses()
    {
        return $this->hasMany(OrderGlass::className(), ['company_id' => 'id']);
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        if (UploadedFile::getInstance($this, 'file')) {
            LoadFile::saveImage($this, UploadedFile::getInstance($this, 'file'));
        }

        parent::save($runValidation, $attributeNames);
    }

}
