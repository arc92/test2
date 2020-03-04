<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Bascket;
use app\models\BascketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BascketController implements the CRUD actions for Bascket model.
 */
class BascketController extends Controller
{
    public $enableCsrfValidation = false;
    public function beforeActions($action)
    {            
        if ($action->id == 'view') {
            $this->enableCsrfValidation = false;
        }
        
        return parent::beforeActions($action);
    }
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
     * Lists all Bascket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Bascket();
        $searchModel = new BascketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'model'=>$model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bascket model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $bascket= \app\models\Bascket::find()->where(['id' => $id])->with(['cart','cart.cartoptions','cart.cartoptions.product','cart.cartoptions.product.featurevalues','cart.cartoptions.product.featurevalues.fvoptions'])->all();
        ini_set('memory_limit','4000M');

        return $this->render('view', [ 
            'model' => $bascket

        ]);
    }

    /**
     * Creates a new Bascket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bascket();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionPdf()
    {
      
        return $this->render('pdf' );
    }

    /**
     * Updates an existing Bascket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->sendDate=Yii::$app->jdate->date('Y/m/d');
            $model->save();
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bascket model.
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
     * Finds the Bascket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bascket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bascket::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
