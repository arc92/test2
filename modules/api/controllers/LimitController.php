<?php

namespace app\modules\api\controllers;



use yii\web\Controller;



class LimitController extends Controller

{
    /**
 * @inheritdoc
 */
public function behaviors()
{
    return [
        'corsFilter' => [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                // restrict access to
                'Origin' => ['http://www.rezamansouri.id.ir', 'https://www.rezamansouri.id.ir'],
                // Allow only POST and PUT methods
                'Access-Control-Request-Method' => ['POST', 'PUT'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Request-Headers' => ['X-Wsse'],
                // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],

        ],
    ];
}

    public $enableCsrfValidation = false;





    public function actionShow($id){

        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        $productItem=[];
        $i=1;
    if($id){
        foreach (\app\models\Product::find()->all() as $product) {
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
            if ($i++ ==$id) break;
        }
    }
  
    return['status'=>true,'code'=>200,'message'=>null,'data'=>$productItem];
}






        // if($id==10)

        // return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->orderBy(['id'=>SORT_DESC])->limit(10)->asArray()->all()];

        // if($id==20)

        // return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->orderBy(['id'=>SORT_DESC])->limit(20)->asArray()->all()];

        // if($id==30)

        // return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->orderBy(['id'=>SORT_DESC])->limit(30)->asArray()->all()];

     

  



    // public function actionLimit20(){

    //     \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;

        

    //     return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->orderBy(['id'=>SORT_DESC])->limit(10)->asArray()->all()];

     

    // }

    // public function actionLimit30(){

    //     \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;

        

    //     return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->orderBy(['id'=>SORT_DESC])->limit(10)->asArray()->all()];

     

    // }

}

