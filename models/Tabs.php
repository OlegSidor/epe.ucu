<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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


    /**
     * @param $items
     * @param $url
     *
     * @return array
     */
    public static function generateTree($items, $url)
    {
        $parents = ArrayHelper::map($items, 'id', 'parent');
        $arr = [];
        foreach ($items as $item) {
            //            print_r($item['name']."\n");
            if (!$item['parent']) {
                $arr[$item['id']]['label'] = $item['name'];
                if($url) $arr[$item['id']]['url'] = $item['url'];
            } else {
                $path_to_root = Tabs::findRoot($item['parent'], $parents);
                $path_to_root = array_reverse($path_to_root);
                $path = &Tabs::getChild($path_to_root, $arr);
                $path[$item['id']]['label'] = $item['name'];
                if ($url) $path[$item['id']]['url'] = $item['url'];
            }
        }
        return $arr;
    }

    /**
     * @param       $parent
     * @param       $parents
     * @param array $path
     *
     * @return array
     */
    public static function findRoot($parent, $parents, &$path = [])
    {
        array_push($path, $parent);
        if ($parents[$parent]) {
            Tabs::findRoot($parents[$parent], $parents, $path);
        }
        return $path;
    }

    /**
     * @param $path
     * @param $arr
     *
     * @return mixed
     */
    public static function &getChild($path, &$arr)
    {
        foreach ($path as $item){
            $arr = &$arr[$item]['items'];
        }
        return $arr;
    }

}
