<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Blog;
use app\models\BlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use app\models\MultiUploads;
use app\models\Uploads;
use yii\web\UploadedFile;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
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
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blog model.
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
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blog(); 
        $multiupload = new Uploads();  
        if ($model->load(Yii::$app->request->post())  ) { 
            $model->create_date=Yii::$app->jdate->date('Y/m/d');  
            
            $multiupload->imageFile = UploadedFile::getInstance($multiupload, 'imageFile');
            if($multiupload->imageFile!=null)
            $model->img=$multiupload->upload();
            if($model->save()){
          
                foreach($model->tags as $_name){
                    $tagmodel= new \app\models\Tagblog();
                   $tagmodel->blogID=$model->id;
                    $tagmodel->name=$_name; 
                    $tagmodel->save(); 
                }
                 // if($multiupload->imageFile){
            //         $imgmodel= new \app\models\Blogimg();
            //        $imgmodel->blogID=$model->id;
            //         $imgmodel->img=$multiupload->upload();
            //         $imgmodel->text=$model->texts;
            //         $imgmodel->save();
                   
            //     } 
              
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'multiupload'=>$multiupload, 
        ]);
    }

    /**
     * Updates an existing Blog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id); 
        $tagmodel = \app\models\Tagblog::find()->Where(['blogID'=>$id])->all(); 
        $blogimg = \app\models\Blogimg::find()->Where(['blogID'=>$id])->all(); 
        

        $multiupload = new Uploads();   
        if ($model->load(Yii::$app->request->post()) ) {
            $model->create_date=Yii::$app->jdate->date('Y/m/d');  
            $multiupload->imageFile = UploadedFile::getInstance($multiupload, 'imageFile');
            if($multiupload->imageFile!=null)
            $model->img=$multiupload->upload();
            if($model->save()){
               

                if( $tagmodel){  
                    if(\app\models\Tagblog::find()->Where(['blogID'=>$id])->count()>0){
                        foreach(\app\models\Tagblog::find()->Where(['blogID'=>$id])->all() as $item){
                            $item->delete();
                        } 
                    }

                    if(Yii::$app->request->post('tags')){
                        foreach(Yii::$app->request->post('tags') as $_cat){  
                            $tags=new \app\models\Tagblog();
                            $tags->name=$_cat;
                            $tags->blogID=$model->id;
                            $tags->save();    
                        }
                    }
                    }elseif($model->tags){
                        foreach($model->tags as $_cat){  
                            $tags=new \app\models\Tagblog();
                            $tags->name=$_cat;
                            $tags->blogID=$model->id;
                            $tags->save();    
                        }
                    } 
                    // if( $blogimg){  
                    //     if(\app\models\Blogimg::find()->Where(['blogID'=>$id])->count()>0){
                    //         foreach(\app\models\Blogimg::find()->Where(['blogID'=>$id])->all() as $itemblogimg){
                    //             $itemblogimg->delete();
                    //         } 
                    //     }
                    // if($multiupload->imageFile){
                    //     $imgmodel= new \app\models\Blogimg();
                    //    $imgmodel->blogID=$model->id;
                    //     $imgmodel->img=$multiupload->upload();
                    //     $imgmodel->text=$model->texts;
                    //     $imgmodel->save();
                       
                    // } 
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'multiupload'=>$multiupload,
            'tagmodel'=>$tagmodel,
        ]);
    }

    /**
     * Deletes an existing Blog model.
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
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
