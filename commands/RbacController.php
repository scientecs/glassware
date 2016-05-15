<?php

/**
 * RBAC controller
 *
 * PHP version 5.5
 *
 * @package    app\commands
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;

/**
 * RbacController
 */
class RbacController extends Controller
{

    public function actionInit()
    {
        $authManager = Yii::$app->authManager;

        //Create roles
        $user = $authManager->createRole('user');
        $admin = $authManager->createRole('admin');

        //Create permissions
        $view = $authManager->createPermission('view');
        $login = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
        $signUp = $authManager->createPermission('sign-up');
        $error = $authManager->createPermission('error');
        $order = $authManager->createPermission('order');
        $create = $authManager->createPermission('create');
        $update = $authManager->createPermission('update');
        $delete = $authManager->createPermission('delete');

        //Add permissions in $authManager
        $authManager->add($view);
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($signUp);
        $authManager->add($error);
        $authManager->add($order);
        $authManager->add($create);
        $authManager->add($update);
        $authManager->add($delete);

        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);

        // Add rule "UserGroupRule" in roles
        $user->ruleName = $userGroupRule->name;
        $admin->ruleName = $userGroupRule->name;

        // Add roles in Yii::$app->authManager
        $authManager->add($user);
        $authManager->add($admin);

        //Add permissions for guest role
        $authManager->addChild($user, $view);
        $authManager->addChild($user, $login);
        $authManager->addChild($user, $logout);
        $authManager->addChild($user, $signUp);
        $authManager->addChild($user, $error);
        $authManager->addChild($user, $order);

        //Add permissions for admin role
        $authManager->addChild($admin, $user);
        $authManager->addChild($admin, $create);
        $authManager->addChild($admin, $update);
        $authManager->addChild($admin, $delete);
    }

}
