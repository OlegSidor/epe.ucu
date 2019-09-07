<?php

namespace app\controllers;

use app\models\News;
use app\models\Pages;
use app\models\Tabs;
use app\models\TextBlocks;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @param $action
     *
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {

        $Tabs                         = ArrayHelper::index(Tabs::find()->asArray()->all(), 'id');
        $items                        = Tabs::generateTree($Tabs, 1, 1);
        $this->view->params['navbar'] = $items;
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @param null $search
     *
     * @return string
     */
    public function actionIndex($search = null)
    {
//        if($search != null) return $this->search($search);
        $news  = News::find()->orderBy('date DESC')->where('date>="'.date('Y-m-d', strtotime('1 month')).'"')->asArray()->all();
        if(count($news)  < 5){
            $news = News::find()->orderBy('date DESC')->limit(5)->asArray()->all();
        }
        $textBlocks = TextBlocks::find()->asArray()->all();
        $textBlocks = ArrayHelper::index($textBlocks, 'name');
        $items = [];
        $mainTabs = Tabs::findAll(['show_in_main' => 1]);
        $mainTabs_render = $this->renderAjax('tabs_tile', ['childs' => $mainTabs]);
        foreach ($news as $new) {
            array_push($items,
                Html::tag('a', Html::img($new['img']) . Html::tag('div', Html::tag('h3', $new['title']) . Html::tag('p', $new['short_desc']), ['class' => 'desc']), ['class' => 'new', 'href' => '/news/' . $new['url']]));
        }
        return $this->render('index', ['news' => $items, 'textBlocks' => $textBlocks, 'main_tabs' => $mainTabs_render]);
    }

    private function search($query){

    }

    /**
     * @param $url
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionNews($url)
    {

        $model = $this->findNews($url);
        return $this->render('view_new', [
            'model' => $model,
        ]);

    }

    /**
     * @param $url
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($url)
    {

        $model   = $this->findPage($url);
        $model->content = $this->addTabs($model->content);
        $model->content = $this->addTemplates($model->content);
        return $this->render('view', ['model' => $model]);
    }


    /**
     * @param $content
     *
     * @return mixed
     */
    public function addTemplates($content){
        $matches = [];
        preg_match_all('/<templates class="template-prev" data-template="(.+)">.*<\/templates>/', $content, $matches);
        foreach ($matches[0] as $key=>$match) {
            $tpl = $matches[1][$key];

            $template = $this->renderAjax('@app/web/templates/'.$tpl);

            $content = str_replace($match, $template, $content);
        }
        return $content;
    }

    /**
     * @param $content
     *
     * @return mixed
     */
    public function addTabs($content){
        $matches = [];
        preg_match_all('/<tabs class="tabs-prev" data-parent="(.+)">.*<\/tabs>/', $content, $matches);
        foreach ($matches[0] as $key=>$match) {
            $parent_name = $matches[1][$key];
            if ($parent_name != "Menu") {
                $parent = Tabs::findOne(['name' => $parent_name]);
                $childs = Tabs::findAll(['parent' => $parent->{'id'}]);
            } else {
                $childs = Tabs::findAll(['parent' => 0]);
            }

            $tabs = $this->renderAjax('tabs_tile', ['childs' => $childs]);
           $content = str_replace($match, $tabs, $content);
        }
        return $content;
    }

    /**
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param string $url
     *
     * @return Pages|array|\yii\db\ActiveRecord
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findPage($url)
    {
        if (($model = Pages::find()->where(['url' => $url])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param string $url
     *
     * @return Pages|array|\yii\db\ActiveRecord
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findNews($url)
    {
        if (($model = News::find()->where(['url' => $url])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
