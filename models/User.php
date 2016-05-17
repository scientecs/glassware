<?php

/**
 * User smodel
 *
 * PHP version 5.5
 *
 * @package    app\models
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $birth_day
 * @property string $last_login
 * @property string $group
 *
 * @property OrderGlass[] $orderGlasses
 */
class User extends ActiveRecord implements IdentityInterface
{

    public $auth_key;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'birth_day' => 'Birth Day',
            'last_login' => 'Last Login',
        ];
    }

    /**
     * Get order glasses 
     *
     * @return ActiveQuery
     */
    public function getOrderGlasses()
    {
        return $this->hasMany(OrderGlass::className(), ['user_id' => 'id']);
    }

    /**
     * Method for get user's id
     * 
     * @return int id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Find user by username
     *
     * @param string $username
     *
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = User::find()
                ->where(['username' => $username])
                ->one();

        return $user;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Validate password
     * 
     * @param string $password
     *
     * @return boolena
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Get auth key 
     *
     * @return string
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validate auth key 
     *
     * @param string $authKey
     * @return type
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Find identity
     *
     * @param int $id
     *
     * @return User
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

}
