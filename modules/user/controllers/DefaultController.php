<?php

namespace app\modules\user\controllers;

use yii\web\Controller;
use Yii;
use \app\models\Users;
use app\models\Uploads;
use yii\web\UploadedFile;

/**
 * Default controller for the `user` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $upload = new Uploads();
        $user=Users::find()->where(['id'=>\Yii::$app->session['user_id']])->one();
       
        if ( $user->load(Yii::$app->request->post()) ){
            $upload->imageFile = UploadedFile::getInstance($upload, 'imageFile');
            if(isset($upload->imageFile) && $upload->imageFile!=null)
            $user->img=$upload->upload();
           if($user->save()){
            \Yii::$app->session->setFlash('success', 'کاربر گرامی اطلاعات شما با موفقیت ثبت شد');
           } else {
                \Yii::$app->session->setFlash('error', "متاسفانه خطایی رخ داده است!!!");
            }
           
        }
     
   
        $changepass=Users::find()->where(['id'=>\Yii::$app->session['user_id']])->one();
        $changepass->password='';

        if ( $changepass->load(Yii::$app->request->post()) ){
            $changepass->password = \Yii::$app->getSecurity()->generatePasswordHash($changepass->password);
            if($changepass->save()){
                $changepass->password='';
             \Yii::$app->session->setFlash('agree', 'کاربر گرامی اطلاعات شما با موفقیت ثبت شد');
            } else {
                $changepass->password='';
            \Yii::$app->session->setFlash('disagree', "متاسفانه خطایی رخ داده است!!!");
             }
            
         }
        
        return $this->render('index',[
            'user'=>$user,
            'changepass'=>$changepass,
            'upload'=>$upload,

        ]);
    }
}
