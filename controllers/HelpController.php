<?php



namespace app\controllers;



use Yii;

use yii\filters\AccessControl;

use yii\web\Controller;

use yii\web\Response;

use yii\filters\VerbFilter; 

use yii\widgets\ActiveForm; 

class HelpController extends Controller

{



   

    /**

     * Displays homepage.

     *

     * @return string

     */

  

    public function actionIndex()

    {
        $setting=\app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one(); 
        \Yii::$app->view->registerMetaTag([
          'name' => 'description',
          'content' => $setting->description_help
      ]);
      \Yii::$app->view->title=$setting->title_help;

        $category=\app\models\Cathelp::find()->all();

        $models=\app\models\Help::find()->all();

        $questions=\app\models\Questionhelp::find()->all();

        $file=\app\models\File::find()->orderBy(['id'=>SORT_DESC])->one();

       

        return $this->render('index',[

            'category'=>$category,

            'models'=>$models,

            'questions'=>$questions,
            'file'=> $file,

        ]);

    }

    public function actionDownload(){
        $file=\app\models\File::find()->orderBy(['id'=>SORT_DESC])->one(); 
        $path =   \Yii::getAlias('@webroot').'/uploads/'.$file->filename;
        \yii::$app->response->sendFile($path);
      
        //var_dump($download->errors);exit;
    }

   

   

}

