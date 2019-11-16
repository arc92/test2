<?php
namespace app\modules\api\controllers;

use yii\web\Controller;

class ProductController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionShow($categoryID=null , $catID=null,$subcatID=null,$planID=null,$colorID=null,$name=null ){
        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
            $productItem=[];
            $i=0;
        if($categoryID==null && $catID==null  && $subcatID==null  && $planID==null && $colorID==null && $name==null){
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
            
                $i++;
            }
        }
        if($categoryID==null && $catID!=null  && $subcatID==null  && $planID==null  && $colorID==null && $name==null ){
            $catrelations=\app\models\CategoryRelation::find()->Where(['catID'=>$catID])->all();
            foreach($catrelations as $catrelation){
            foreach (\app\models\Product::find()->Where(['id'=>$catrelation->productID])->all() as $product) {
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

    if($categoryID==null && $catID==null && $subcatID!=null && $planID==null  && $colorID==null && $name==null ){
        $subcatrelations=\app\models\SubcatRelation::find()->Where(['subcatID'=>$subcatID])->all();
        foreach($subcatrelations as $subcatrelation){
        foreach (\app\models\Product::find()->Where(['id'=>$subcatrelation->productID])->all() as $product) {
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
        if($categoryID==null && $catID==null && $subcatID==null && $planID!=null  && $colorID==null && $name==null ){
            foreach (\app\models\Product::find()->Where(['planID'=>$planID])->all() as $product) {
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

    if($categoryID==null && $catID==null && $subcatID==null && $planID==null  && $colorID!=null && $name==null ){
        foreach (\app\models\Product::find()->Where(['colorID'=>$colorID])->all() as $product) {
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

        if($categoryID==null && $catID==null && $subcatID==null && $planID!=null  && $colorID!=null && $name==null ){
            foreach (\app\models\Product::find()->Where(['planID'=>$planID])->andWhere(['colorID'=>$colorID])->all() as $product) {
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
     
        if($categoryID==null && $catID==null && $subcatID!=null && $planID!=null  && $colorID==null && $name==null ){
            $subcatrelations=\app\models\SubcatRelation::find()->Where(['subcatID'=>$subcatID])->all(); 
            foreach($subcatrelations as $subcatrelation){
            foreach (\app\models\Product::find()->Where(['id'=>$subcatrelation->productID])->andWhere(['planID'=>$planID])->all() as $product) {
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
        if($categoryID==null && $catID==null && $subcatID!=null && $planID!=null  && $colorID==null && $name==null ){
            $subcatrelations=\app\models\SubcatRelation::find()->Where(['subcatID'=>$subcatID])->all(); 
            foreach($subcatrelations as $subcatrelation){
            foreach (\app\models\Product::find()->Where(['planID'=>$planID])->andWhere(['id'=>$subcatrelation->productID])->all() as $product) {
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
       
        if($categoryID==null && $catID==null && $subcatID==null && $planID!=null  && $colorID==null && $name!=null ){ 
            $features=\app\models\Featurevalue::find()->Where(['like','value',$name])->all(); 
            foreach ($features as $feature) {
            foreach (\app\models\Product::find()->Where(['id'=> $feature->productID])->andWhere(['planID'=>$planID])->all() as $product) {
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
    if($categoryID==null && $catID==null && $subcatID!=null && $planID==null  && $colorID==null && $name!=null ){ 
      
        $features=\app\models\Featurevalue::find()->Where(['like','value',$name])->all(); 
        foreach ($features as $feature) {
            $featurearray[$feature->productID]=$feature->productID; 
        }
        $subcatrelations=\app\models\SubcatRelation::find()->Where(['subcatID'=>$subcatID])->andWhere(['productID'=> $featurearray])->all();  
        foreach($subcatrelations as $subcatrelation){
            $catIDarray[$subcatrelation->productID]=$subcatrelation->productID;
        }
      
        foreach (\app\models\Product::find()->Where(['id'=> $catIDarray])->all() as $product) {
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
    if($categoryID!=null && $catID==null  && $subcatID==null  && $planID==null  && $colorID==null && $name==null ){
        $categorys=\app\models\Catproduct::find()->Where(['id'=>$categoryID])->one();  
        foreach (\app\models\Product::find()->Where(['like','name', $categorys->name])->all() as $product) {
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
        
        
        return['status'=>true,'code'=>200,'message'=>null,'data'=>$productItem];
    }



}
//         if($catID!=null && $subcatID!=null && $planID==null  && $colorID==null){
//             foreach (\app\models\Product::find()->Where(['catID'=>$catID])->andWhere(['subcatID'=>$subcatID])->all() as $product) {
//                 $productItem[$i]['id']=$product->id;
//                 $productItem[$i]['name']=$product->name;
//                 $productItem[$i]['price']=$product->price;
//                 $productItem[$i]['image']=$product->productimgs->img;
//                 $i++;
//             }
//         }

//         if($catID!=null && $subcatID!=null && $planID!=null  && $colorID==null){
//             foreach (\app\models\Product::find()->Where(['catID'=>$catID])->andWhere(['subcatID'=>$subcatID])->andWhere(['planID'=>$planID])->all() as $product) {
//                 $productItem[$i]['id']=$product->id;
//                 $productItem[$i]['name']=$product->name;
//                 $productItem[$i]['price']=$product->price;
//                 $productItem[$i]['image']=$product->productimgs->img;
//                 $i++;
//             }
//         }

//         if($catID!=null && $subcatID!=null && $planID!=null  && $colorID!=null){
//             foreach (\app\models\Product::find()->Where(['catID'=>$catID])->andWhere(['subcatID'=>$subcatID])->andWhere(['planID'=>$planID])->andWhere(['colorID'=>$colorID])->all() as $product) {
//                 $productItem[$i]['id']=$product->id;
//                 $productItem[$i]['name']=$product->name;
//                 $productItem[$i]['price']=$product->price;
//                 $productItem[$i]['image']=$product->productimgs->img;
//                 $i++;
//             }
//         }
          
        // return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->Where(['catID'=>$catID])->andWhere(['subcatID'=>$subcatID])->andWhere(['planID'=>$planID])->asArray()->all()];
        // if($catID!=null&& $subcatID==null  && $planID==null )
        // return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->Where(['catID'=>$catID])->asArray()->all()];
        // if($catID!=null&& $subcatID!=null  && $planID==null )
        // return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->Where(['catID'=>$catID])->andWhere(['subcatID'=>$subcatID])->asArray()->all()];
       
   

    // public function actionShow($id=null){
    //     \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        
    //     if($id==null)
    //     return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->asArray()->all()]; 
    //     if($id!=null)
    //     return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->Where(['catID'=>$id])->asArray()->all()];
      
    // }








    // public function actionShow($catID=null){
    //     \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        
        
    //     if($catID==null)
    //     return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->asArray()->all()]; 
    //     if($catID!=null)
    //     return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->Where(['catID'=>$catID])->asArray()->all()];
      
    // }

  

   


// public function actionShow($catID=null,$subcatID=null,$panelID=null){
    //     \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        
    //     if($catID==null && $subcatID=null && $panelID=null)
    //     return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->asArray()->all()];
    //      if($catID!=null && $subcatID!=null )
    //      return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->where(['catID'=>$catID])->asArray()->all()];
    //     // if($catID!=null && $subcatID!=null && $planID!=null )
    //     // return['status'=>true,'code'=>200,'message'=>null,'data'=>\app\models\Product::find()->where(['catID'=>$catID])->andWhere(['subcatID'=>$subcatID])->andWhere(['planID'=>$planID])->asArray()->all()];
  
    // }