<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Piccat;
use app\models\PiccatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Uploads;
use app\models\Upload;
use yii\web\UploadedFile;

/**
 * PiccatController implements the CRUD actions for Piccat model.
 */
class PiccatController extends Controller
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
     * Lists all Piccat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PiccatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Piccat model.
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
     * Creates a new Piccat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Piccat();
        $uploads = new Uploads();
        $upload = new Upload();

        if (Yii::$app->request->post() ) {
            $uploads->imageFile = UploadedFile::getInstance($uploads, 'imageFile');
            $upload->imgFile = UploadedFile::getInstance($upload, 'imgFile');
            $model->imgone=$uploads->upload();
            $model->imgtow=$upload->upload();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'uploads' => $uploads,
            'upload' => $upload,
        ]);
    }

    /**
     * Updates an existing Piccat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $uploads = new Uploads();
        $upload = new Upload();

        if (Yii::$app->request->post()) {
            $uploads->imageFile = UploadedFile::getInstance($uploads, 'imageFile');
            $upload->imgFile = UploadedFile::getInstance($upload, 'imgFile');
            $model->imgone=$uploads->upload();
            $model->imgtow=$upload->upload();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'uploads' => $uploads,
            'upload' => $upload,
        ]);
    }

    /**
     * Deletes an existing Piccat model.
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
     * Finds the Piccat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Piccat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Piccat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
