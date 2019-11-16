<?php



namespace app\controllers;



use Yii;

use yii\filters\AccessControl;

use yii\web\Controller;

use yii\web\Response;

use yii\filters\VerbFilter; 

use yii\widgets\ActiveForm; 

class BranchesController extends Controller

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
          'content' => $setting->description_branches
      ]);
      \Yii::$app->view->title=$setting->title_branches;

        $branches=\app\models\Branch::find()->where(['isTop'=>3])->orderBy(['id'=>SORT_DESC])->all();

        $branchone=\app\models\Branch::find()->where(['isTop'=>1])->one(); 

        $branchtow=\app\models\Branch::find()->where(['isTop'=>2])->limit(4)->all();
        
        $branchimg=\app\models\Branchimg::find()->orderBY(['id'=>SORT_DESC])->one(); 

   

       

        return $this->render('index',[

            'branches'=>$branches,

            'branchone'=>$branchone,
            'branchtow'=>$branchtow,
            'branchimg'=>$branchimg,

        ]);

    }

   

   

}

