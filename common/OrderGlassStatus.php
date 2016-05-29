<?php

/**
 * OrderGlassStatus model
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
use yii\db\ActiveQuery;

/**
 * This is the model class for table "order_glass_status".
 *
 * @property integer $id
 * @property string $name
 *
 * @property OrderGlass[] $orderGlasses
 */
class OrderGlassStatus extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_glass_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getOrderGlasses()
    {
        return $this->hasMany(OrderGlass::className(), ['order_glass_status_id' => 'id']);
    }

}
