<?php

use yii\db\Migration;

/**
 * Class m190709_145934_user_module_init
 */
class m190709_145934_user_module_init extends Migration
{
    public function up()
    {
        Yii::$app->runAction('migrate/up', [
            'migrationPath' => '@vendor/dektrium/yii2-user/migrations',
            'interactive' => false
        ]);
    }


    public function down()
    {
        Yii::$app->runAction('migrate/down', [
            'migrationPath' => '@vendor/dektrium/yii2-user/migrations',
            'interactive' => false
        ]);
    }
}
