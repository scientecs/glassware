<?php

namespace app\common;

use Yii;
use app\models\User;

/**
 * This is the model class for table "order_glass".
 *
 * @property integer $id
 * @property integer $order_glass_status_id
 * @property integer $department_id
 * @property string $date
 * @property string $time
 * @property integer $is_notyfication
 * @property string $profit_alcogol
 * @property string $profit_bank
 * @property string $profit_broken_glass
 * @property string $total_profit
 * @property integer $count_alcogol
 * @property integer $count_bank
 * @property string $weight_broken_glass
 * @property integer $user_id
 *
 * @property OrderGlassStatus $orderGlassStatus
 * @property Department $department
 * @property User $user
 */
class OrderGlass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_glass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_glass_status_id', 'department_id', 'date', 'time', 'total_profit', 'user_id'], 'required'],
            [['order_glass_status_id', 'department_id', 'is_notyfication', 'count_alcogol', 'count_bank', 'user_id'], 'integer'],
            [['date'], 'safe'],
            [['profit_alcogol', 'profit_bank', 'profit_broken_glass', 'total_profit', 'weight_broken_glass'], 'number'],
            [['time'], 'string', 'max' => 255],
            [['order_glass_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderGlassStatus::className(), 'targetAttribute' => ['order_glass_status_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_glass_status_id' => 'Order Glass Status ID',
            'department_id' => 'Department ID',
            'date' => 'Date',
            'time' => 'Time',
            'is_notyfication' => 'Is Notyfication',
            'profit_alcogol' => 'Profit Alcogol',
            'profit_bank' => 'Profit Bank',
            'profit_broken_glass' => 'Profit Broken Glass',
            'total_profit' => 'Total Profit',
            'count_alcogol' => 'Count Alcogol',
            'count_bank' => 'Count Bank',
            'weight_broken_glass' => 'Weight Broken Glass',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGlassStatus()
    {
        return $this->hasOne(OrderGlassStatus::className(), ['id' => 'order_glass_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
