<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Messages;

/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $messagesNew = Messages::find()->where(['new' => 1])->orderBy('date DESC')->all();

        return $this->render('index', compact('messagesNew'));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSearch($q){

//        first level -- products

        $productsIds = ArrayHelper::getColumn(ProductLangName::find()
            ->where(['like', 'lang_name', $q])
            ->orWhere(['like', 'art_id', $q])
            ->all(), 'art_id');

        $products = Products::find()->where(['art_id' => $productsIds])->all();

//        second level -- orders

        $ordersIds = ArrayHelper::getColumn(OrdersProducts::find()
            ->where(['like', 'name', $q])
            ->orWhere(['like', 'art_id', $q])
            ->orWhere(['like', 'order_id', $q])
            ->all(), 'art_id');

        $orders = OrdersProducts::find()->where(['art_id' => $ordersIds])->all();


//        third level -- actions

        $actionsds = ArrayHelper::getColumn(ActionsLang::find()
            ->where(['like', 'seo_title', $q])
            ->orWhere(['like', 'seo_description', $q])
            ->orWhere(['like', 'seo_keywords', $q])
            ->orWhere(['like', 'text_preview', $q])
            ->orWhere(['like', 'text', $q])
            ->orWhere(['like', 'item_id', $q])
            ->all(), 'item_id');

        $actions = Actions::find()->where(['id' => $actionsds])->all();

//        level 4 -- news. Проверить от какой модели идут новости на прод

        $newsIds = ArrayHelper::getColumn(NewsLang::find()
            ->where(['like', 'title', $q])
            ->orWhere(['like', 'description', $q])
            ->orWhere(['like', 'content', $q])
            ->orWhere(['like', 'item_id', $q])
            ->all(), 'item_id');

        $news = News::find()->where(['id' => $newsIds])->all();

        return $this->render('search', compact('q', 'products', 'orders', 'actions', 'news'));
    }
}
