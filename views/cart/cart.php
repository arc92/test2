<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */


?>
<main class="shopping-cart"> 

    <div class="container p-0 over-flow-responsive">
   
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable" style="text-align:center;">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
         <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('error2')): ?>
    <div class="alert alert-danger alert-dismissable" style="text-align:center;">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
         <?= Yii::$app->session->getFlash('error2') ?>
    </div>
<?php endif; ?>
        <section class="name-bar">
         <span class="title img">
            عکس محصول
        </span>
            <span class="title">
            عنوان و ویژگی انتخاب شده
        </span>
            <span class="title number">
            انتخاب تعداد
        </span>
            <span class="title off">
         قیمت محصول
        </span>
            <span class="title price">
           جمع قیمت
        </span>
            <span class="title delete">
            حذف از سبد
        </span>
        </section>
    </div>
    <section class="boxes">
        <div class="container p-0 over-flow-responsive" >
        <?php foreach($carts as $cart){ 
                 foreach($cartoptions as $cartoption){
                    if($cartoption->cartID==$cart->id){
                    foreach($products as $product){
                        if($product->id==$cartoption->productID){?> 
            <div class="item" style="justify-content: space-evenly;">
          
                <div class="img">
                    <img src="/<?=$product->productimgs->img ?>" alt="">
                </div>
       
                <div class="text-item">
                    <h3 class="title">
                    <?=$product->name ?> 
                    </h3>
                    <?php if(\app\models\Featurevalue::find()->Where(['productID'=>$product->id])->all()){?>
                    <h4 class="model">

                        <?=$product->plan->name.'- سایز    ' ?>
                        <?php foreach(\app\models\Fvoption::find()->Where(['cartoptionID'=>$cartoption->id])->all() as $foption){
                                echo $foption->featurev->value;
                        } ?>
                    </h4>
                    <?php } ?>
                </div>
             
                <div class="number">
                    <form action="#">
                        <div class="count-product count"  >
                            <div class="btn btn-minus down" id="adddown<?=$cartoption->id?>"  data-adddown="<?=$cartoption->id?>">
                                <i class="icon-006-left-chevron"></i>
                            </div> 
                     <?php if($x=\app\models\Fvoption::find()->Where(['cartoptionID'=>$cartoption->id])->andWhere(['not',['featurevID'=>null]])->one()){
                              if($num=\app\models\Featurevalue::find()->Where(['id'=>$x->featurevID])->one()){ 
                                if($cartoption->count>$num->count && $num->count >0){
                                    Yii::$app->session->setFlash('error', "  تعداد درخواستی شما برای محصول  $product->name   موجود نمی باشد!!");  
                                    $cartoptioncount=\app\models\Cartoption::findOne($cartoption->id);
                                    $cartoptioncount->count=$num->count;
                                    if($cartoptioncount->save()){  ?>
                                    <script> location.reload(); </script>
                               <?php  }  ?> 
                            <input type="number" class="count" min="1" max="<?=$num->count?>" value="<?=$cartoption->count?>" readonly  title=""/>
                               <?php  }elseif($num->count ==0 || $num->count < 0){
                                    Yii::$app->session->setFlash('error', "  سبد خرید شما تغییر کرده است. این محصول  $product->name   موجود نمی باشد!!");  
                                    $cartoptioncount=\app\models\Cartoption::findOne($cartoption->id);
                                    $cartoptioncount->delete(); 
                               }else{ ?>
                                    <input type="number" class="count" min="1" max="<?=$product->count?>" value="<?=$cartoption->count?>" readonly  title=""/>
                               <?php }  }  
                                            }else{
                                   if($cartoption->count>$product->count && $product->count>0){
                                    Yii::$app->session->setFlash('error', "  تعداد درخواستی شما برای محصول  $product->name   موجود نمی باشد!!");  
                                       $cartoptioncount=\app\models\Cartoption::findOne($cartoption->id);
                                       $cartoptioncount->count=$product->count;
                                       if($cartoptioncount->save()){  ?>
                                       <script> location.reload(); </script>
                                  <?php   } ?>
                                  <input type="number" class="count" min="1" max="<?=$product->count?>" value="<?=$cartoption->count?>" readonly  title=""/>
                                 <?php  }elseif($product->count==0){
                                       Yii::$app->session->setFlash('error2',"  سبد خرید شما تغییر کرده است.  محصول  $product->name   موجود نمی باشد!!");  
                                       $cartoptioncount=\app\models\Cartoption::findOne($cartoption->id);
                                      if($cartoptioncount->delete()){?>
                                        <script> location.reload(); </script>
                                        <?php } 
                                             }else{ ?>
                                <input type="number" class="count" min="1" max="<?=$product->count?>" value="<?=$cartoption->count?>" readonly  title=""/>
                               <?php } }?>
                            <div class="btn btn-plus up"  id="addup<?=$cartoption->id?>"  data-addup="<?=$cartoption->id?>">
                                <i class="icon-005-right-chevron"></i>
                            </div>
                          
                            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                            <script>
                                jQuery('#addup<?=$cartoption->id?>').on('click',function(e){
                                    e.preventDefault();
                                    var data = $(this).attr('data-addup');
                                    console.log(data );
                                    $.ajax({
                                        url: '/cart/plus',
                                        data: {id: data} 
                                    })

                                });
                                jQuery('#adddown<?=$cartoption->id?>').on('click',function(e){
                                    e.preventDefault();
                                    var data = $(this).attr('data-adddown');
                                    console.log(data );
                                    $.ajax({
                                        url: '/cart/minus',
                                        data: {id: data} 
                                    })
                                });
                            </script>
                           

                         
                        </div>
                    </form>
                </div>

                <span class="off"> 
                <?=$cartoption->amount?> 
                <!-- //($product->storePrice-$cartoption->amount)*$cartoption->count -->
                </span>
                <span class="price">  <?=$cartoption->amount*$cartoption->count?>   تومان
                </span>
                <!-- <button class="btn deleted bg-transparent">
                    <i class="icon-dump"></i>
                </button> -->
                <?= Html::a(' <i class="icon-dump"></i>',['/cart/delete?id='.$cartoption->id], ['class' => 'btn deleted bg-transparent']) ?>

            </div>
                <?php } }  } } }?>
     
        </div>
    </section>
    <section class="btn-groups">
        <div class="container p-0 d-flex flex-wrap align-items-center justify-content-between">
            <a class="btn add" href="/product/index">
              <span>
                  افزودن محصول دیگر
              </span>
            </a>
            <div class="two-btn d-flex flex-wrap align-items-center">
                <div class="total-price">
                <span class="title">
                قیمت کل محصولات
            </span>
                    <span class="price"> 
                     <?php
                     $sumprice=0;
                     foreach($carts as $cart){ 
                        foreach($cartoptions as $cartoption){
                           if($cartoption->cartID==$cart->id){
                         $sumprice+=$cartoption->amount*$cartoption->count;
                     }
                    }
                }
                    echo $sumprice;
                    ?>
            تومان
                </span>
                </div>
                <a class="btn next-step" href="/endstep/index">
                 <span>
                      رفتن به مرحله نهایی
                 </span>
                </a>
            </div>
        </div>
    </section>
</main>