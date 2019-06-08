<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tabs}}".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $position
 * @property int $parent
 */
class Tabs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tabs}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['position', 'parent'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
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
            'url' => Yii::t('app', 'Url'),
            'position' => Yii::t('app', 'Position'),
            'parent' => Yii::t('app', 'Parent'),
        ];
    }
}
