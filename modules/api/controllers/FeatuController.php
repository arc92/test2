<?php
namespace app\modules\api\controllers;

use yii\web\Controller;

class FeatuController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionSize($name=null){
        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
            $productItem=[];
            $i=0;
        if($name!=null ){ 
            $features=\app\models\Featurevalue::find()->Where(['like','value',$name])->all(); 
            foreach ($features as $feature) {
            foreach (\app\models\Product::find()->Where(['id'=> $feature->productID])->all() as $product) {
                $productItem[$i]['id']=$product->id;
                $productItem[$i]['name']=$product->name;
                $productItem[$i]['price']=$product->price;
                $productItem[$i]['image']=$product->productimgs->img;
                if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
                    $productItem[$i]['offer']=$offer->percent;  
                    
                  }
                  if($product->checkCount()==true ){ 
                    $productItem[$i]['count']='1';  
                } else{
                    $productItem[$i]['count']='0';  
                }
                $i++;
            }
        }
    }
        return['status'=>true,'code'=>200,'message'=>null,'data'=>$productItem];
    }



   
}