<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%team}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $short_description
 * @property string $img
 * @property string $url
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%team}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name', 'img', 'url', 'short_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'img' => Yii::t('app', 'Img'),
            'short_description' => Yii::t('app', 'Short description')
        ];
    }
}
