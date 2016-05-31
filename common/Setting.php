<?php

/**
 * Setting model
 *
 * PHP version 5.5
 *
 * @package    app\common
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\common;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "setting".
 *
 * @property integer $id
 * @property string $name
 * @property string $key
 * @property string $value
 */
class Setting extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'key', 'value'], 'required'],
            [['name', 'key', 'value'], 'string', 'max' => 255],
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
            'key' => 'Ключ',
            'value' => 'Значение',
        ];
    }

    /**
     * Method for get value by key
     *
     * @param string $key
     * @return string
     */
    public static function getValueByKey($key)
    {
        $setting = Setting::findOne([
                    'key' => $key
        ]);

        return $setting->value;
    }

}
