<?php

namespace backend\controllers;

use Yii;
use common\models\PagesLang;
use backend\models\PagesLangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PagesLangController implements the CRUD actions for PagesLang model.
 */
class PagesLangController extends Controller
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
     * Lists all PagesLang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagesLangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PagesLang model.
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
     * Creates a new PagesLang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($item_id)
    {
        $model = new PagesLang();
        $model->item_id = $item_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/pages/view', 'id' => $model->item_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'item_id' => $item_id
        ]);
    }

    /**
     * Updates an existing PagesLang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/pages/view', 'id' => $model->item_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PagesLang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $item_id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/pages/view', 'id' => $item_id]);
    }

    /**
     * Finds the PagesLang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PagesLang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $query = PagesLang::find();
        if(!empty($id)) $query->where(['id' => $id]);

        $model = $query->one();

        if ($model !== null) {

            return $model;

        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
