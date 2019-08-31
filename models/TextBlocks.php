<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%text_blocks}}".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $text
 */
class TextBlocks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%text_blocks}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['text'], 'string'],
            [['name', 'title'], 'string', 'max' => 255],
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
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
        ];
    }
}
