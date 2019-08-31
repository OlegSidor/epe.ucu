<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `Admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     * @throws ForbiddenHttpException
     */
    public function actionIndex()
    {
        $this->can('adminView');
        return $this->render('index');
    }

    /**
     * @param $what
     *
     * @throws ForbiddenHttpException
     */
    public function can($what)
    {
        if (!Yii::$app->user->can($what)) {
            throw new ForbiddenHttpException(Yii::t('app', 'You are not allowed to perform this action.'));
        }
    }
}
