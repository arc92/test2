<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Aboutus;
use app\models\AboutusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MultiUploads;
use yii\web\UploadedFile;

/**
 * AboutusController implements the CRUD actions for Aboutus model.
 */
class AboutusController extends Controller
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
     * Lists all Aboutus models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AboutusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aboutus model.
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
     * Creates a new Aboutus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aboutus();
        $multiupload= new MultiUploads();
        $multiupload->imageFiles = UploadedFile::getInstances($multiupload, 'imageFiles'); 

        if ($model->load(Yii::$app->request->post())) {

            $model->submitDate=Yii::$app->jdate->date('Y/m/d');
           if($model->save()){
          
            foreach($multiupload->multiupload() as $file){
                $imgmodel= new \app\models\Aboutimg();
                $imgmodel->aboutID=$model->id;
                $imgmodel->img=$file;
                $imgmodel->save();            
             }
            return $this->redirect(['view', 'id' => $model->id]);
            } 
        }

        return $this->render('create', [
            'model' => $model,
            'multiupload'=>$multiupload, 
        ]);
    }

    /**
     * Updates an existing Aboutus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $multiupload= new MultiUploads();
        $multiupload->imageFiles = UploadedFile::getInstances($multiupload, 'imageFiles'); 

        if ($model->load(Yii::$app->request->post())) {

            $model->submitDate=Yii::$app->jdate->date('Y/m/d');
            if($model->save()){

                foreach($multiupload->multiupload() as $file){
                    $imgmodel= new \app\models\Aboutimg();
                    $imgmodel->aboutID=$model->id;
                    $imgmodel->img=$file;
                    $imgmodel->save();            
                 }

            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'multiupload'=>$multiupload, 
        ]);
    }

    /**
     * Deletes an existing Aboutus model.
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
     * Finds the Aboutus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aboutus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aboutus::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
