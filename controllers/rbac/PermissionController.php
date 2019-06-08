<?php

namespace app\controllers\rbac;

use Yii;
use dektrium\rbac\controllers\PermissionController as RbacPermission;

class PermissionController extends RbacPermission
{
    /**
     * Shows create form.
     * @return string|Response
     * @throws \yii\base\InvalidConfigException
     */
    public function actionCreate()
    {
        /** @var \dektrium\rbac\models\Role|\dektrium\rbac\models\Permission $model */
        $model = \Yii::createObject([
            'class' => $this->modelClass,
            'scenario' => 'create',
        ]);


        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Shows update form.
     *
     * @param  string $name
     *
     * @return string|Response
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionUpdate($name)
    {
        /** @var \dektrium\rbac\models\Role|\dektrium\rbac\models\Permission $model */
        $item = $this->getItem($name);
        $model = \Yii::createObject([
            'class' => $this->modelClass,
            'scenario' => 'update',
            'item' => $item,
        ]);


        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
}