<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use app\models\News;


class NewsimportController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     *
     * @param string $message the message to be echoed.
     *
     * @return int Exit code
     * @throws \yii\db\Exception
     */
    public function actionIndex()
    {
        $posts = Yii::$app->db->createCommand('SELECT post_date, post_content, post_title, post_name, p2.meta_value FROM wp_posts LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id) LEFT JOIN wp_term_taxonomy ON (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id) INNER JOIN wp_postmeta postmeta ON (postmeta.post_id = wp_posts.ID) INNER JOIN wp_postmeta p2 ON (postmeta.meta_value = p2.post_id) WHERE wp_term_taxonomy.term_id IN (8) AND p2.meta_key = "_wp_attached_file" GROUP BY wp_posts.post_date DESC;')->queryAll();
        foreach ($posts as $post){
            $content = str_replace("\n","",$post['post_content']);
            $title = str_replace("\n","",$post['post_title']);

            preg_match('/\[\:ua\](.*)\[\:.*\]/', $content, $matches_content);
            preg_match('/\[\:ua\](.*)\[\:.*\]/', $title, $matches_title);
            $post['post_content'] = $matches_content[1] ?? $post['post_content'];
            $post['post_title'] = $matches_title[1] ?? $post['post_title'];
            $post['short_title'] = mb_substr(strip_tags($post['post_content']), 0, 240). '...';
            $post['meta_value'] = '/upload/files/'. $post['meta_value'];

            $news = new News();
            $news->title = $post['post_title'];
            $news->content = $post['post_content'];
            $news->short_desc = $post['short_title'];
            $news->date = $post['post_date'];
            $news->url = $post['post_name'];
            $news->img = $post['meta_value'];
            $news->save();
        }
        return ExitCode::OK;
    }
}
