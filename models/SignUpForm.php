<?php

/**
 * SignUp Form
 *
 * PHP version 5.5
 *
 * @package    app\models
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * SignUpForm
 */
class SignUpForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $birthDay;

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['username', 'email', 'birthDay', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'string', 'min' => 6],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['birthDay', 'date', 'format' => 'dd-MM-yyyy']
        ];
    }

    /**
     * Method for signUp user 
     *
     * @return User
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->birth_day = date("Y-m-d", strtotime($this->birthDay));
            $user->group = 'user';

            if ($user->save(false)) {
                $authManager = Yii::$app->authManager;
                $userRole = $authManager->getRole('user');
                $authManager->assign($userRole, $user->getId());
            }

            return $user;
        }

        return null;
    }

}
