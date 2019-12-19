<?php

namespace app\modules\admin\controllers;

use app\models\News;
use Yii;
use app\models\Team;
use app\modules\admin\models\TeamSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeamController implements the CRUD actions for Team model.
 */
class TeamController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Team models.
     * @return mixed
     * @throws ForbiddenHttpException
     */
    public function actionIndex()
    {
        $this->can('viewTeam');
        $searchModel = new TeamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Team model.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws ForbiddenHttpException
     */
    public function actionView($id)
    {
        $this->can('viewTeam');
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Team model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws ForbiddenHttpException
     */
    public function actionCreate()
    {
        $this->can('createTeam');
        $model = new Team();

        if ($model->load(Yii::$app->request->post())) {
            $model->url = News::str2url($model->name);
            if($model->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Team model.
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
        $this->can('modifyTeam');
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->url = News::str2url($model->name);
            if($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Team model.
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
        $this->can('deleteTeam');
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Team model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Team the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Team::findOne($id)) !== null) {
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
        if (Yii::$app->user->can('modifyTeam') || Yii::$app->user->can('createTeam')) {
            $session = Yii::$app->session;
            $session->open();

            $_SESSION['KCFINDER']['uploadURL']              = '/upload';
            $_SESSION['KCFINDER']['uploadDir']              = Yii::getAlias('@app') . '/web/upload';
            $_SESSION['KCFINDER']['thumbsDir']              = '.thumbs';
            $_SESSION['KCFINDER']['thumbWidth']             = '100';
            $_SESSION['KCFINDER']['thumbHeight']            = '100';
            $_SESSION['KCFINDER']['theme']                  = 'default';
            $_SESSION['KCFINDER']['types']['files']['type'] = '';
            $_SESSION['KCFINDER']['access']['files']        = [
                'upload' => true,
                'delete' => true,
                'copy'   => true,
                'move'   => true,
                'rename' => true,
            ];
            $_SESSION['KCFINDER']['access']['dirs']         = [
                'create' => true,
                'delete' => true,
                'rename' => true,
            ];
            $_SESSION['KCFINDER']['disabled']               = false;
            $session->close();
        }
        if (!Yii::$app->user->can($what)) {
            throw new ForbiddenHttpException(Yii::t('app', 'You are not allowed to perform this action.'));
        }
    }
}
