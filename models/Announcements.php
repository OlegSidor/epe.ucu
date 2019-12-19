<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%announcements}}".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $short_desc
 * @property string $date
 * @property string $url
 * @property string $img
 */
class Announcements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%announcements}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['date'], 'safe'],
            [['title', 'short_desc', 'url', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'short_desc' => Yii::t('app', 'Short Desc'),
            'date' => Yii::t('app', 'Date'),
            'url' => Yii::t('app', 'Url'),
            'img' => Yii::t('app', 'Img'),
            'all_title' => Yii::t('app', 'Анонси')
        ];
    }
}
