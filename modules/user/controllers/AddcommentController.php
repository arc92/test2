<?php



namespace app\modules\user\controllers;



use yii\web\Controller;

use Yii; 

use \app\models\Subject;

use \app\models\Addcomment; 

use yii\data\Pagination;

use yii\base\BaseObject;

use yii\base\Configurable;

use yii\web\Link;

use yii\web\Linkable;

use yii\web\Request;

/**

 * Default controller for the `user` module

 */

class AddcommentController extends Controller

{

    /**

     * Renders the index view for the module

     * @return string

     */

    public function actionIndex($id=null)

    {

     $addcomment=\app\models\Addcomment::find()->Where(['userID'=>\yii::$app->session['user_id']])->orderBy(['id'=>SORT_DESC]);

     $countQuery = clone $addcomment;

     $count = $countQuery->count();

     $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>5]);

     $articles = $addcomment->offset($pagination->offset)

     ->limit($pagination->limit)

      ->all();




      if(isset($id)){
        $model=\app\models\Addcomment::find()->Where(['id'=>$id])->one();
     }else{
        $model = new \app\models\Addcomment();
     } 

        if ($model->load(Yii::$app->request->post()) ) {  

            $model->userID=\yii::$app->session['user_id'];

            $model->status=0;

            $model->submitDate=Yii::$app->jdate->date('Y/m/d');

            $model->save();
           
            return $this->redirect(['/user/addcomment/index']);
        } 

        

        return $this->render('index',[

            'model'=>$model,

            'addcomment'=>$addcomment,

            'pagination'=>$pagination,

            'articles'=>$articles,

        ]);

    }



    public function actionDelete($id)

    {

        $addcomment=\app\models\Addcomment::findOne($id)->delete();

   



        return $this->redirect(['index']);

    }

    

}

