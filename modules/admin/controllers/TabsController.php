<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Tabs;
use app\modules\admin\models\TabsSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TabsController implements the CRUD actions for Tabs model.
 */
class TabsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tabs models.
     * @return mixed
     * @throws ForbiddenHttpException
     */
    public function actionIndex()
    {
        $this->can('viewTabs');
        $searchModel  = new TabsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new Tabs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws ForbiddenHttpException
     */
    public function actionCreate()
    {
        $this->can('createTabs');
        $model = new Tabs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $parents    = ArrayHelper::map(Tabs::find()->where(['parent' => 0])->asArray()->all(), 'id', 'name');
        $parents[0] = Yii::t('app', 'Menu');
        ksort($parents);

        $Tabs = ArrayHelper::index(Tabs::find()->asArray()->all(), 'id');

        $items = Tabs::generateTree($Tabs, 0);

        return $this->render('create', [
            'model'   => $model,
            'parents' => $parents,
            'items'   => $items,
        ]);
    }


    /**
     * Updates an existing Tabs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws ForbiddenHttpException
     */
    public function actionUpdate($id)
    {
        $this->can('modifyTabs');
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $parents    = ArrayHelper::map(Tabs::find()->where(['parent' => 0])->asArray()->all(), 'id', 'name');
        $parents[0] = Yii::t('app', 'Menu');
        ksort($parents);

        $Tabs  = ArrayHelper::index(Tabs::find()->asArray()->all(), 'id');
        $items = Tabs::generateTree($Tabs, 0);


        return $this->render('update', [
            'model'   => $model,
            'parents' => $parents,
            'items'   => $items,
        ]);
    }

    /**
     * Deletes an existing Tabs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->can('deleteTabs');
        $this->delChilds($id);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * @param $id
     *
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function delChilds($id)
    {
        $childrens = Tabs::find()->where(['parent' => $id])->all();
        foreach ($childrens as $children) {
            $this->delChilds($children->id);
            $children->delete();
        }
    }

    /**
     * Finds the Tabs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Tabs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tabs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * @param $what
     *
     * @throws ForbiddenHttpException
     */
    public function can($what)
    {
        if (Yii::$app->user->can('modifyTabs') || Yii::$app->user->can('createTabs')) {
            $session = Yii::$app->session;
            $session->open();

            $_SESSION['KCFINDER']['uploadURL'] = '/upload';
            $_SESSION['KCFINDER']['uploadDir'] = Yii::getAlias('@app').'/web/upload';
            $_SESSION['KCFINDER']['thumbsDir'] = '.thumbs';
            $_SESSION['KCFINDER']['thumbWidth'] = '100';
            $_SESSION['KCFINDER']['thumbHeight'] = '100';
            $_SESSION['KCFINDER']['theme'] = 'default';
            $_SESSION['KCFINDER']['types']['files']['type'] = '';
            $_SESSION['KCFINDER']['access']['files']     = [
                'upload' => true,
                'delete' => true,
                'copy'   => true,
                'move'   => true,
                'rename' => true,
            ];
            $_SESSION['KCFINDER']['access']['dirs']      = [
                'create' => true,
                'delete' => true,
                'rename' => true,
            ];
            $_SESSION['KCFINDER']['disabled']  = false;
            $session->close();
        }
        if (!Yii::$app->user->can($what)) {
            throw new ForbiddenHttpException(Yii::t('app', 'You are not allowed to perform this action.'));
        }
    }
}
