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
                'class' => VerbFilter::className(),
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
        $searchModel = new TabsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
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

        $parents = ArrayHelper::map(Tabs::find()->asArray()->all(), 'id', 'name');
        $parents[0] = Yii::t('app', 'Menu');
        ksort($parents);

        $Tabs = ArrayHelper::index(Tabs::find()->asArray()->all(), 'id');

        $items = $this->generateTree($Tabs, 1);

        return $this->render('create', [
            'model' => $model,
            'parents' => $parents,
            'items' => $items,
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
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $parents = ArrayHelper::map(Tabs::find()->asArray()->all(), 'id', 'name');
        $parents[0] = Yii::t('app', 'Menu');
        ksort($parents);

        $Tabs = ArrayHelper::index(Tabs::find()->asArray()->all(), 'id');

        $items = $this->generateTree($Tabs, 1);


        return $this->render('update', [
            'model' => $model,
            'parents' => $parents,
            'items' => $items,
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @throws ForbiddenHttpException
     */
    public function actionMove()
    {
        $this->can('moveTabs');
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
     * @param $items
     * @param $url
     *
     * @return array
     */
    public function generateTree($items, $url)
    {
        $parents = ArrayHelper::map($items, 'id', 'parent');
        $arr = [];
        foreach ($items as $item) {
            //            print_r($item['name']."\n");
            if (!$item['parent']) {
                $arr[$item['id']]['label'] = $item['name'];
                if($url) $arr[$item['id']]['url'] = $item['url'];
            } else {
                $path_to_root = $this->findRoot($item['parent'], $parents);
                $path_to_root = array_reverse($path_to_root);
                $path = &$this->getChild($path_to_root, $arr);
                $path[$item['id']]['label'] = $item['name'];
                if ($url) $path[$item['id']]['url'] = $item['url'];
            }
        }
        return $arr;
    }

    /**
     * @param       $parent
     * @param       $parents
     * @param array $path
     *
     * @return array
     */
    public function findRoot($parent, $parents, &$path = [])
    {
        array_push($path, $parent);
        if ($parents[$parent]) {
            $this->findRoot($parents[$parent], $parents, $path);
        }
        return $path;
    }

    /**
     * @param $path
     * @param $arr
     *
     * @return mixed
     */
    public function &getChild($path, &$arr)
    {
        foreach ($path as $item){
            $arr = &$arr[$item]['items'];
        }
        return $arr;
    }

    /**
     * @param $what
     *
     * @throws ForbiddenHttpException
     */
    public function can($what){
        if(!Yii::$app->user->can($what)){
            throw new ForbiddenHttpException(Yii::t('app', 'You can\'t do that'));
        }
    }
}
