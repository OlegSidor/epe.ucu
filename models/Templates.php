<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "{{%pages}}".
 *
 * @property string $name
 * @property string $content
 */
class Templates extends Model
{
    public $name;
    public $content;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['content', 'string'],
            ['name', 'required'],
            ['name', 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'content' => Yii::t('app', 'Content'),
        ];
    }
}
