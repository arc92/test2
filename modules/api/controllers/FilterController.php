<?php
namespace app\modules\api\controllers;

use yii\web\Controller;

class FilterController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionShow($categoryID=null , $catID=null,$subcatID=null,$planID=null,$colorID=null,$name=null ){
        $today=\Yii::$app->jdate->date('Y/m/d');
        \yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
            $productItem=[];
            $i=0;
  
     
    if($categoryID!=null && $catID==null && $subcatID==null && $planID==null  && $colorID==null && $name==null ){ 
        foreach (\app\models\Product::find()->Where(['catproductID'=>$categoryID])->all() as $product) {
            $productItem[$i]['id']=$product->id;
            $productItem[$i]['name']=$product->name;
            $productItem[$i]['price']=$product->price;
            $productItem[$i]['image']=$product->productimgs->img;
            if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
                if($today>=$offer->start_date and $today<=$offer->end_date){ 
                     $productItem[$i]['offer']=$offer->percent;  
                }
              }
              if($product->checkCount()==true ){ 
                $productItem[$i]['count']='1';  
            } else{
                $productItem[$i]['count']='0';  
            }
            $i++;
    }
}  
    if($categoryID!=null && $catID==null && $subcatID!=null && $planID==null  && $colorID==null && $name==null ){
        $subcatrelations=\app\models\SubcatRelation::find()->Where(['subcatID'=>$subcatID])->all();
        foreach($subcatrelations as $subcatrelation){
            $arraysub[$subcatrelation->productID]=$subcatrelation->productID;
        }
        foreach (\app\models\Product::find()->Where(['id'=>$arraysub])->andWhere(['catproductID'=>$categoryID])->all() as $product) {
            $productItem[$i]['id']=$product->id;
            $productItem[$i]['name']=$product->name;
            $productItem[$i]['price']=$product->price;
            $productItem[$i]['image']=$product->productimgs->img;
            if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
                if($today>=$offer->start_date and $today<=$offer->end_date){ 
                $productItem[$i]['offer']=$offer->percent;  
                }
              }
              if($product->checkCount()==true ){ 
                $productItem[$i]['count']='1';  
            } else{
                $productItem[$i]['count']='0';  
            }
            $i++; 
    }
}  
if($categoryID!=null && $catID==null && $subcatID==null && $planID!=null  && $colorID==null && $name==null ){ 
    foreach (\app\models\Product::find()->Where(['catproductID'=>$categoryID])->andWhere(['planID'=>$planID])->all() as $product) {
        $productItem[$i]['id']=$product->id;
        $productItem[$i]['name']=$product->name;
        $productItem[$i]['price']=$product->price;
        $productItem[$i]['image']=$product->productimgs->img;
        if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
            if($today>=$offer->start_date and $today<=$offer->end_date){ 
            $productItem[$i]['offer']=$offer->percent;  
            }
            }
            if($product->checkCount()==true ){ 
            $productItem[$i]['count']='1';  
        } else{
            $productItem[$i]['count']='0';  
        }
        $i++; 
}
}  
if($categoryID!=null && $catID==null && $subcatID==null && $planID==null  && $colorID!=null && $name==null ){ 
    foreach (\app\models\Product::find()->Where(['catproductID'=>$categoryID])->andWhere(['colorID'=>$colorID])->all() as $product) {
        $productItem[$i]['id']=$product->id;
        $productItem[$i]['name']=$product->name;
        $productItem[$i]['price']=$product->price;
        $productItem[$i]['image']=$product->productimgs->img;
        if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
            if($today>=$offer->start_date and $today<=$offer->end_date){ 
            $productItem[$i]['offer']=$offer->percent;  
            }
            }
            if($product->checkCount()==true ){ 
            $productItem[$i]['count']='1';  
        } else{
            $productItem[$i]['count']='0';  
        }
        $i++; 
}
}  

if($categoryID!=null && $catID==null && $subcatID==null && $planID==null  && $colorID==null && $name!=null ){ 
    $features=\app\models\Featurevalue::find()->Where(['like','value',$name])->all(); 
    foreach ($features as $feature) {
    foreach (\app\models\Product::find()->Where(['id'=> $feature->productID])->andWhere(['catproductID'=>$categoryID])->all() as $product) {
      
        $productItem[$i]['id']=$product->id;
        $productItem[$i]['name']=$product->name;
        $productItem[$i]['price']=$product->price;
        $productItem[$i]['image']=$product->productimgs->img;
        if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
            if($today>=$offer->start_date and $today<=$offer->end_date){ 
            $productItem[$i]['offer']=$offer->percent;  
            }
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
if($categoryID!=null && $catID==null && $subcatID!=null && $planID!=null  && $colorID==null && $name==null ){
    $subcatrelations=\app\models\SubcatRelation::find()->Where(['subcatID'=>$subcatID])->all();
    foreach($subcatrelations as $subcatrelation){
    foreach (\app\models\Product::find()->Where(['catproductID'=>$categoryID])->andWhere(['planID'=>$planID])->andWhere(['id'=>$subcatrelation->productID])->all() as $product) {
        $productItem[$i]['id']=$product->id;
        $productItem[$i]['name']=$product->name;
        $productItem[$i]['price']=$product->price;
        $productItem[$i]['image']=$product->productimgs->img;
        if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
            if($today>=$offer->start_date and $today<=$offer->end_date){ 
            $productItem[$i]['offer']=$offer->percent;  
            }
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

if($categoryID!=null && $catID==null && $subcatID!=null && $planID!=null  && $colorID!=null && $name==null ){
    $subcatrelations=\app\models\SubcatRelation::find()->Where(['subcatID'=>$subcatID])->all();
    foreach($subcatrelations as $subcatrelation){
    foreach (\app\models\Product::find()->Where(['id'=>$subcatrelation->productID])->andWhere(['catproductID'=>$categoryID])->andWhere(['planID'=>$planID])->andWhere(['colorID'=>$colorID])->all() as $product) {
        $productItem[$i]['id']=$product->id;
        $productItem[$i]['name']=$product->name;
        $productItem[$i]['price']=$product->price;
        $productItem[$i]['image']=$product->productimgs->img;
        if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
            if($today>=$offer->start_date and $today<=$offer->end_date){ 
            $productItem[$i]['offer']=$offer->percent;  
            }
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
if($categoryID!=null && $catID==null && $subcatID==null && $planID!=null  && $colorID!=null && $name==null ){ 
    foreach (\app\models\Product::find()->Where(['catproductID'=>$categoryID])->andWhere(['planID'=>$planID])->andWhere(['colorID'=>$colorID])->all() as $product) {
        $productItem[$i]['id']=$product->id;
        $productItem[$i]['name']=$product->name;
        $productItem[$i]['price']=$product->price;
        $productItem[$i]['image']=$product->productimgs->img;
        if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
            if($today>=$offer->start_date and $today<=$offer->end_date){ 
            $productItem[$i]['offer']=$offer->percent;  
            }
          }
          if($product->checkCount()==true ){ 
            $productItem[$i]['count']='1';  
        } else{
            $productItem[$i]['count']='0';  
        }
        $i++;
    
}
}
if($categoryID!=null && $catID==null && $subcatID!=null && $planID!=null  && $colorID!=null && $name!=null ){
    $features=\app\models\Featurevalue::find()->Where(['value'=>$name])->all();  
    $subcatrelations=\app\models\SubcatRelation::find()->Where(['subcatID'=>$subcatID])->all(); 
    foreach ($features as $feature) {
        $array[$feature->productID]=$feature->productID;
    }
    foreach($subcatrelations as $subcatrelation){
        $arraysub[$subcatrelation->productID]=$subcatrelation->productID;
    }
    
    foreach (\app\models\Product::find()->Where(['id'=> $array])->andWhere(['id'=>$arraysub])->andWhere(['catproductID'=>$categoryID])->andWhere(['planID'=>$planID])->andWhere(['colorID'=>$colorID])->all() as $product) {   
        $productItem[$i]['id']=$product->id;
        $productItem[$i]['name']=$product->name;
        $productItem[$i]['price']=$product->price;
        $productItem[$i]['image']=$product->productimgs->img;
        if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
            if($today>=$offer->start_date and $today<=$offer->end_date){ 
            $productItem[$i]['offer']=$offer->percent;  
          }
        }
          if($product->checkCount()==true ){ 
            $productItem[$i]['count']='1';  
        } else{
            $productItem[$i]['count']='0';  
        }
        $i++;
    }
    
}       
if($categoryID!=null && $catID==null && $subcatID!=null && $planID!=null  && $colorID==null && $name!=null ){
    $features=\app\models\Featurevalue::find()->Where(['value'=>$name])->all();  
    $subcatrelations=\app\models\SubcatRelation::find()->Where(['subcatID'=>$subcatID])->all(); 
    foreach ($features as $feature) {
        $array[$feature->productID]=$feature->productID;
    }
    foreach($subcatrelations as $subcatrelation){
        $arraysub[$subcatrelation->productID]=$subcatrelation->productID;
    }
    
    foreach (\app\models\Product::find()->Where(['id'=> $array])->andWhere(['id'=>$arraysub])->andWhere(['catproductID'=>$categoryID])->andWhere(['planID'=>$planID])->all() as $product) {   
        $productItem[$i]['id']=$product->id;
        $productItem[$i]['name']=$product->name;
        $productItem[$i]['price']=$product->price;
        $productItem[$i]['image']=$product->productimgs->img;
        if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
            if($today>=$offer->start_date and $today<=$offer->end_date){ 
            $productItem[$i]['offer']=$offer->percent;  
            }
          }
          if($product->checkCount()==true ){ 
            $productItem[$i]['count']='1';  
        } else{
            $productItem[$i]['count']='0';  
        }
        $i++;
    }
    
}       
if($categoryID!=null && $catID==null && $subcatID!=null && $planID==null  && $colorID==null && $name!=null ){
    $features=\app\models\Featurevalue::find()->Where(['value'=>$name])->all();  
    $subcatrelations=\app\models\SubcatRelation::find()->Where(['subcatID'=>$subcatID])->all(); 
    foreach ($features as $feature) {
        $array[$feature->productID]=$feature->productID;
    }
    foreach($subcatrelations as $subcatrelation){
        $arraysub[$subcatrelation->productID]=$subcatrelation->productID;
    }
    
    foreach (\app\models\Product::find()->Where(['id'=> $array])->andWhere(['id'=>$arraysub])->andWhere(['catproductID'=>$categoryID])->all() as $product) {   
        $productItem[$i]['id']=$product->id;
        $productItem[$i]['name']=$product->name;
        $productItem[$i]['price']=$product->price;
        $productItem[$i]['image']=$product->productimgs->img;
        if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
            if($today>=$offer->start_date and $today<=$offer->end_date){ 
            $productItem[$i]['offer']=$offer->percent;  
            }
          }
          if($product->checkCount()==true ){ 
            $productItem[$i]['count']='1';  
        } else{
            $productItem[$i]['count']='0';  
        }
        $i++;
    }
    
}       
if($categoryID!=null && $catID==null && $subcatID==null && $planID==null  && $colorID!=null && $name!=null ){
    $features=\app\models\Featurevalue::find()->Where(['value'=>$name])->all();   
    foreach ($features as $feature) {
        $array[$feature->productID]=$feature->productID;
    } 
    foreach (\app\models\Product::find()->Where(['id'=> $array])->andWhere(['catproductID'=>$categoryID])->andWhere(['colorID'=>$colorID])->all() as $product) {   
        $productItem[$i]['id']=$product->id;
        $productItem[$i]['name']=$product->name;
        $productItem[$i]['price']=$product->price;
        $productItem[$i]['image']=$product->productimgs->img;
        if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
            if($today>=$offer->start_date and $today<=$offer->end_date){ 
            $productItem[$i]['offer']=$offer->percent;  
            }
          }
          if($product->checkCount()==true ){ 
            $productItem[$i]['count']='1';  
        } else{
            $productItem[$i]['count']='0';  
        }
        $i++;
    }
    
}       
if($categoryID!=null && $catID==null && $subcatID==null && $planID!=null  && $colorID!=null && $name!=null ){
    $features=\app\models\Featurevalue::find()->Where(['value'=>$name])->all();  
    foreach ($features as $feature) {
        $array[$feature->productID]=$feature->productID;
    }
      
    foreach (\app\models\Product::find()->Where(['id'=> $array])->andWhere(['catproductID'=>$categoryID])->andWhere(['planID'=>$planID])->andWhere(['colorID'=>$colorID])->all() as $product) {   
        $productItem[$i]['id']=$product->id;
        $productItem[$i]['name']=$product->name;
        $productItem[$i]['price']=$product->price;
        $productItem[$i]['image']=$product->productimgs->img;
        if($offer=\app\models\Offer::find()->Where(['planID'=>$product->planID])->one()){
            if($today>=$offer->start_date and $today<=$offer->end_date){ 
            $productItem[$i]['offer']=$offer->percent;  
            }
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

