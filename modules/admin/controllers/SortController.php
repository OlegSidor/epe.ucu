<?php

namespace app\modules\admin\controllers;

use app\models\Tabs;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `Admin` module
 */
class SortController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     * @throws ForbiddenHttpException
     */
    public function actionIndex()
    {
        $this->can('viewSort');
        $tabs        = Tabs::find()->orderBy('position')->asArray()->all();
        $tabs_sorted = [];
        foreach ($tabs as $tab) {
            $tabs_sorted[$tab['parent']][] = ['content' => "<div id=\"$tab[id]\" data-pos=\"$tab[position]\">$tab[name]</div>", 'disabled' => !Yii::$app->user->can('modifySort')];
        }
        return $this->render('index', ['tabs' => $tabs_sorted]);
    }

    /**
     * @throws ForbiddenHttpException
     */
    public function actionDo()
    {
        $this->can('modifySort');
        $id  = Yii::$app->request->post('id');
        $pos = Yii::$app->request->post('position');

        $tab           = Tabs::findOne(['id' => $id]);
        $tab->position = $pos;
        if ($tab->save()) {
            return "ok";
        }
        return "err";
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
