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
use app\models\User;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "order_glass".
 *
 * @property integer $id
 * @property integer $order_glass_status_id
 * @property integer $company_id
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
 * @property Company $company
 * @property OrderGlassStatus $orderGlassStatus
 * @property User $user
 */
class OrderGlass extends ActiveRecord
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
            [['order_glass_status_id', 'company_id', 'date', 'time', 'total_profit', 'user_id'], 'required'],
            [['order_glass_status_id', 'company_id', 'is_notyfication', 'count_alcogol', 'count_bank', 'user_id'], 'integer'],
            [['date'], 'safe'],
            [['profit_alcogol', 'profit_bank', 'profit_broken_glass', 'total_profit', 'weight_broken_glass'], 'number'],
            [['time'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['order_glass_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderGlassStatus::className(), 'targetAttribute' => ['order_glass_status_id' => 'id']],
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
            'order_glass_status_id' => 'ID статуса заказа',
            'company_id' => 'ID компании',
            'date' => 'Дата',
            'time' => 'Время',
            'is_notyfication' => 'Пользователь оповещен?',
            'profit_alcogol' => 'Прибыль от алкголя',
            'profit_bank' => 'Прибыль от банок',
            'profit_broken_glass' => 'Прибыль от битого стекла',
            'total_profit' => 'Общая прибыль',
            'count_alcogol' => 'Количество алкоголя',
            'count_bank' => 'Количетство банок',
            'weight_broken_glass' => 'Вес битого стекла',
            'user_id' => 'ID пользователя',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getOrderGlassStatus()
    {
        return $this->hasOne(OrderGlassStatus::className(), ['id' => 'order_glass_status_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
