<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%tabs}}".
 *
 * @property int    $id
 * @property string $name
 * @property string $url
 * @property int    $position
 * @property int    $parent
 * @property string $img
 * @property boolean $hidden
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
            [['hidden', 'show_in_main'], 'boolean'],
            [['position', 'parent'], 'integer'],
            [['name', 'url', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'       => Yii::t('app', 'ID'),
            'name'     => Yii::t('app', 'Name'),
            'url'      => Yii::t('app', 'Url'),
            'position' => Yii::t('app', 'Position'),
            'parent'   => Yii::t('app', 'Parent'),
            'img'      => Yii::t('app', 'Picture'),
            'hidden'      => Yii::t('app', 'hidden to full menu'),
            'show_in_main'      => Yii::t('app', 'Show on main page'),
        ];
    }


    /**
     * @param      $items
     * @param      $url
     *
     * @param bool $new_nav
     *
     * @return array
     */
    public static function generateTree($items, $url, $new_nav = false)
    {
        $parents = ArrayHelper::map($items, 'id', 'parent');
        $arr     = [];
            foreach ($items as $item) {
                if (!$item['parent']) {
                    $arr[$item['id']]['label'] = $item['name'];
                    $arr[$item['id']]['hidden'] = $item['hidden'];
                    if($new_nav)
                        $arr[$item['id']]['parent'] = true;
                    if ($url)
                        $arr[$item['id']]['url'] = $item['url'];
                } else {
                    $path_to_root               = Tabs::findRoot($item['parent'], $parents);
                    $path_to_root               = array_reverse($path_to_root);
                    if($new_nav){
                        $arr[$path_to_root[0]]['childs'][$item['id']]['label'] = $item['name'];
                        $arr[$path_to_root[0]]['childs'][$item['id']]['hidden'] = $item['hidden'];
                        if ($url)
                            $arr[$path_to_root[0]]['childs'][$item['id']]['url'] = $item['url'];
                    } else {
                        $path                       = &Tabs::getChild($path_to_root, $arr);
                        $path[$item['id']]['label'] = $item['name'];
                        $path[$item['id']]['hidden'] = $item['hidden'];
                        if ($url)
                            $path[$item['id']]['url'] = $item['url'];
                    }
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
        foreach ($path as $item) {
            $arr = &$arr[$item]['items'];
        }
        return $arr;
    }

}
