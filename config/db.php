<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost:3302;dbname=uku',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
