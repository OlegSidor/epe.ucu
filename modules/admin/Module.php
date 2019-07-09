<?php

namespace app\modules\admin;


use yii\filters\AccessControl;

/**
 * Admin module definition class
 * @property mixed adminPermission
 */
class Module extends \yii\base\Module
{

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'         => true,
                        'roles'         => ['@'],
                        'matchCallback' => [$this, 'checkAccess'],
                    ]
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * Checks access.
     *
     * @return bool
     */
    public function checkAccess()
    {
        return \Yii::$app->user->can('adminView');
    }
}
