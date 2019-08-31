<?php

$params = require __DIR__ . '/params.php';
$db     = require __DIR__ . '/db.php';

$config = [
    'id'         => 'basic',
    'name'       => 'EPE',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'language'   => 'uk-UA',
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules'    => [
        'user'        => [
            'class'               => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'adminPermission'     => 'admin',
            'layout'              => '@app/modules/admin/views/layouts/main',
        ],
        'admin'       => [
            'class'        => 'app\modules\admin\Module',
            'layout'       => 'main',
        ],
        'rbac'        => [
            'class'           => 'dektrium\rbac\RbacWebModule',
            'adminPermission' => 'admin',
            'layout'          => '@app/modules/admin/views/layouts/main',
            'controllerMap'   => [
                'permission' => 'app\controllers\rbac\PermissionController',
            ],
        ],
        'treemanager' => [
            'class' => '\kartik\tree\Module',
        ],
    ],
    'components' => [
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'GCrgye431Z1j2up4sl75Z32iafDvHSXy',
            'baseUrl'             => '',
        ],
        'authManager'  => [
            'class'        => '\dektrium\rbac\components\DbManager',
            'defaultRoles' => ['user'],
//            'cache'        => 'yii\caching\FileCache',
        ],
        'view'         => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/rbac/views' => '@app/views/rbac',
                ],
            ],
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'           => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
                '' => 'site/index',

                '<admin:(admin|admin\/)>'                                              => '/admin',
                'admin/<controller:([-\w]+|[-\w]+\/)>'                                 => '/admin/<controller>',
                'admin/<controller:([-\w]+|[-\w]+\/)>/<action:([-\w]+|[-\w]+\/)>'      => '/admin/<controller>/<action>',
                'admin/<controller:([-\w]+|[-\w]+\/)>/<action:([-\w]+|[-\w]+\/)>/<id>' => '/admin/<controller>/<action>/<id>',


                '<rbac:(rbac|rbac\/)>'                                                => '/rbac',
                'rbac/<controller:([-\w]+|[-\w]+\/)>'                                 => '/rbac/<controller>',
                'rbac/<controller:([-\w]+|[-\w]+\/)>/<action:([-\w]+|[-\w]+\/)>'      => '/rbac/<controller>/<action>',
                'rbac/<controller:([-\w]+|[-\w]+\/)>/<action:([-\w]+|[-\w]+\/)>/<id>' => '/rbac/<controller>/<action>/<id>',


                '<user:(user|user\/)>'                                                => '/user',
                'user/<controller:([-\w]+|[-\w]+\/)>'                                 => '/user/<controller>',
                'user/<controller:([-\w]+|[-\w]+\/)>/<action:([-\w]+|[-\w]+\/)>'      => '/user/<controller>/<action>',
                'user/<controller:([-\w]+|[-\w]+\/)>/<action:([-\w]+|[-\w]+\/)>/<id>' => '/user/<controller>/<action>/<id>',

                'get-tabs'          => '/site/get-tabs',
                'news/<url:[-\w]+>' => '/site/news',
                '<url:.*>'          => 'site/view',
            ],
        ],
    ],
    'params'     => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class'      => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '31.128.253.162'],
    ];

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class'      => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '31.128.253.162'],
    ];
}

return $config;
