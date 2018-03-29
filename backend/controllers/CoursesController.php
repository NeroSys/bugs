<?php

namespace backend\controllers;

use common\models\CoursesLang;
use Yii;
use common\models\Courses;
use backend\models\CoursesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\Lang;

/**
 * CoursesController implements the CRUD actions for Courses model.
 */
class CoursesController extends Controller
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
     * Lists all Courses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CoursesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Courses model.
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
     * Creates a new Courses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Courses();
        $langs = Lang::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', compact('model', 'langs'));
    }

    /**
     * Updates an existing Courses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $langs = Lang::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update',  compact('model', 'langs'));
    }

    /**
     * Deletes an existing Courses model.
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
     * Finds the Courses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Courses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Courses::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSearch($q){

        $itemsIds = ArrayHelper::getColumn(Courses::find()
            ->where(['like', 'id', $q])
            ->orWhere(['like', 'slug', $q])
            ->orWhere(['like', 'name', $q])
            ->all(), 'id');

        $items = Courses::find()->where(['id' => $itemsIds])->all();

        $langIds = ArrayHelper::getColumn(CoursesLang::find()
            ->where(['like', 'name', $q])
            ->orWhere(['like', 'description', $q])
            ->orWhere(['like', 'text', $q])
            ->all(), 'item_id');

        $subItems = Courses::find()->where(['id' => $langIds])->all();

        return $this->render('search', compact('q', 'items', 'subItems'));
    }


    public function actions()
    {
        return [
            'uploadPhoto' => [
                'class' => 'common\components\cropper\actions\UploadAction',
                'url' => Yii::getAlias('@cropp').'/'.'courses',
                'path' => \Yii::getAlias('@frontend').'/web/upload/courses',
            ]
        ];
    }
}
