<?php

namespace app\modules\user\controllers;

use yii\web\Controller;
use Yii;
use \app\models\Useraddress;


/**
 * Default controller for the `user` module
 */
class AddressController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionAddress($id=null)
    {  
         if(isset($id)){
            $model=\app\models\Useraddress::find()->Where(['id'=>$id])->one();
         }else{
            $model = new \app\models\Useraddress();
         }
        $userID=\Yii::$app->session['user_id'];
        $address=\app\models\Useraddress::find()->Where(['userID'=>$userID])->all();
        if ($model->load(Yii::$app->request->post()) ) {

            $model->userID=$userID;
            $model->status=0;
            $model->create_date=Yii::$app->jdate->date('Y/m/d');
           if($model->save()){
            $model = new \app\models\Useraddress();
            \Yii::$app->session->setFlash('success', 'کاربر گرامی اطلاعات شما با موفقیت ثبت شد');
            } else {
             \Yii::$app->session->setFlash('error', "متاسفانه خطایی رخ داده است!!!");
         }
           
        }
       
         
        
        return $this->render('address',[
            'model'=>$model,
            'address'=>$address,
        ]);
    }
  

    public function actionDelete($id)
    {
        $address=\app\models\Useraddress::findOne($id)->delete();
   

        return $this->redirect(['address']);
    }
    public function actionAdd($id)
    {
        $model =Useraddress::findOne($id);
        //$useraddress =Useraddress::find()->all();
        //$useraddress =Useraddress::find()->Where(['id'!=$id])->andWhere(['userID'=>\yii::$app->session['user_id']])->all();


        if ($model ) {
             $model->status=1; 
                // $useraddress->status=0;
             if($model->save()){ 
                return true;

            }
        
        }
    }
}
