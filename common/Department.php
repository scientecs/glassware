<?php

namespace app\common;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $id
 * @property string $phone
 * @property string $adress
 * @property string $latitude
 * @property string $longitude
 * @property string $schedule
 *
 * @property OrderGlass[] $orderGlasses
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'adress', 'latitude', 'longitude', 'schedule'], 'required'],
            [['phone', 'adress', 'latitude', 'longitude', 'schedule'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Телефон',
            'adress' => 'Адрес',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'schedule' => 'График',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGlasses()
    {
        return $this->hasMany(OrderGlass::className(), ['department_id' => 'id']);
    }
}
