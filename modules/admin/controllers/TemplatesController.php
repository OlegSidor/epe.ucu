<?php

namespace app\modules\admin\controllers;

use app\models\Templates;
use Yii;
use app\models\Tabs;
use app\modules\admin\models\TabsSearch;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TabsController implements the CRUD actions for Tabs model.
 */
class TemplatesController extends Controller
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
        $this->can('viewTemplates');
        $data = [];
        $files = glob(Yii::getAlias('@app').'/web/templates/*');
        foreach ($files as $file){
            $name = explode('/', $file);
            $name = $name[count($name)-1];
            array_push($data, ['name' => $name]);
        }
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
        ]);

        return $this->render('index', [
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
        $model = new Templates();

        if ($model->load(Yii::$app->request->post())) {
            $file = Yii::getAlias('@app').'/web/templates/'.$model->name;
            file_put_contents($file, $model->content);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
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

        if ($model->load(Yii::$app->request->post())) {
            $file = Yii::getAlias('@app').'/web/templates/'.$id;
            if($model->name != $id){
                rename($file, Yii::getAlias('@app').'/web/templates/'.$model->name);
            }
            file_put_contents($file, $model->content);
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'model' => $model,
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
     */
    public function actionDelete($id)
    {
        $this->can('deleteTabs');
        $this->findModel($id);
        $file = Yii::getAlias('@app').'/web/templates/'.$id;
        unlink($file);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Tabs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Templates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $file = Yii::getAlias('@app').'/web/templates/'.$id;
        if (file_exists($file)) {
            $model = new Templates();
            $model->name = $id;
            $model->content = file_get_contents($file);
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
        if (!Yii::$app->user->can($what)) {
            throw new ForbiddenHttpException(Yii::t('app', 'You are not allowed to perform this action.'));
        }
    }
}
