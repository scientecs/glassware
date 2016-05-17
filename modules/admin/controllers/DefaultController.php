<?php

/**
 * SignUp Form model
 *
 * PHP version 5.5
 *
 * @package    app\modules\admin\controllers
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{

    /**
     * Check access to action
     *
     * @param InlineAction $action
     *
     * @return boolean
     *
     * @throws ForbiddenHttpException
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (!\Yii::$app->user->can('admin')) {
                throw new ForbiddenHttpException('Access denied');
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Renders the index view for the module
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
