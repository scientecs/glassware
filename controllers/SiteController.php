<?php

/**
 * Site controller
 *
 * PHP version 5.5
 *
 * @package    app\controllers
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignUpForm;
use app\modules\admin\models\Article;
use yii\data\Pagination;
use app\common\Department;
use yii\db\Query;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();

        $departments = (new Query())->from('department')->all();

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
                    'departments' => $departments,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Method for signupUset
     */
    public function actionSignup()
    {
        $model = new SignUpForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->goBack();
        }

        return $this->render('signup', ['model' => $model]);
    }

    /**
     * Method for render all article
     *
     * @param string $slug
     */
    public function actionBlog($slug = null)
    {
        if ($slug === null) {
            $query = Article::find()->where(['is_published' => 1]);

            $countQuery = clone $query;

            $pagination = new Pagination(['totalCount' => $countQuery->count(),
                'pageSize' => 5]);

            $models = $query->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();

            return $this->render('articles', [
                        'models' => $models,
                        'pagination' => $pagination,
            ]);
        } else {
            $article = Article::find()->where(['slug' => $slug])->one();

            return $this->render('articlePage', ['article' => $article]);
        }
    }

}
