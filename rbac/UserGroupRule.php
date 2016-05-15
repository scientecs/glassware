<?php

/**
 * UserGroupRole
 *
 * PHP version 5.5
 *
 * @package    app\rbac
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\rbac;

use Yii;
use yii\rbac\Rule;

/**
 * UserGroupRole
 */
class UserGroupRule extends Rule
{

    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!\Yii::$app->user->isGuest) {
            $group = \Yii::$app->user->identity->group;
            if ($item->name === 'admin') {
                return $group == 'admin';
            } elseif ($item->name === 'user') {
                return $group == 'admin' || $group == 'user';
            } else {
                return false;
            }

            return true;
        }
    }

}
