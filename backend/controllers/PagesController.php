<?php

namespace backend\controllers;

use Yii;
use common\models\Pages;
use backend\models\PagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Lang;
use common\models\Contacts;

/**
 * PagesController implements the CRUD actions for Pages model.
 */
class PagesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pages model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pages();

        $langs = Lang::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', compact('model', 'langs'));
        }
    }

    /**
     * Updates an existing Pages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $langs = Lang::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([$model->slug]);
        } else {
            return $this->render('update', compact('model', 'langs'));
        }
    }
    /**
     * Deletes an existing Pages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionMain(){

        $model = Pages::find()->where(['slug' => 'main'])->one();

        return $this->render('main', compact('model'));
    }

    public function actionError(){

        $model = Pages::find()->where(['slug' => 'error'])->one();

        return $this->render('error', compact('model'));
    }

    public function actionContacts(){

        $model = Pages::find()->where(['slug' => 'contacts'])->one();

        $contacts = Contacts::find()->all();


        return $this->render('contacts', compact('model', 'contacts'));
    }

    public function actions()
    {
        return [
            'uploadPhoto' => [
                'class' => 'common\components\cropper\actions\UploadAction',
                'url' => Yii::getAlias('@cropp').'/'.'pages',
                'path' => \Yii::getAlias('@frontend').'/web/upload/pages',
            ]
        ];
    }

}
