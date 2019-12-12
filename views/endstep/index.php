<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use hoomanMirghasemi\jdf\Jdf;
/* @var $this yii\web\View */

 
?>
<main class="shopping-end-step" >
    <!-- <form action="#"> -->
    <div class="container p-0 d-flex flex-wrap justify-content-between">
        <section class="information-recipient col-lg-6 col-sm-12 col-12 p-0">
        <span class="title">
            اطلاعات گیرنده
             </span>

             <?php $form = ActiveForm::begin(
               [
                'options' => [
                    'class' => 'd-flex justify-content-between flex-wrap'
                 ]
            ]); ?>
            <?php
                $useraddress=\app\models\Useraddress::find()->Where(['userID'=>\Yii::$app->session['user_id']])->all();
                $address=\app\models\Useraddress::find()->Where(['userID'=>\Yii::$app->session['user_id']])->one();
            if($useraddress!=null){  ?>
                        <label class="item" style=" width: 100%;display: flex;align-items: center;margin-top: 20px;">
                            <input type="checkbox" name="recived" value="1"  style="width: 10px;height: 10px;margin-left: 10px;">
                            دریافت بسته توسط خودم 
                        </label>
            <?php } ?>
                <div class="item">
                    <label for="name">
                نام و نام خانوادگی
                    </label>  
                    <?php if($useraddress==null){?>
                    <?= $form->field($bascket, 'name')->textInput(['required'=>'required','value'=>$user->fullName])->label(false) ?>
                    <?php }else{?>
                        <?= $form->field($bascket, 'name')->textInput(['value'=>$user->fullName])->label(false) ?>
                    <?php } ?>
                </div>
                <!-- <div class="item">
                    <label for="last-name">
                        نام و نام خانوادگی
                    </label> 
                      if($useraddress==null){?>
                     $form->field($bascket, 'family')->textInput(['required'=>'required'])->label(false) ?>
                    }else{?>
                    $form->field($bascket, 'family')->textInput()->label(false) ?>
                      } ?>
                </div> -->
                <div class="item">
                    <label for="country">
                        کشور
                    </label>
                    <input class="disabled" type="text" id="country" placeholder="جمهوری اسلامی ایران" readonly>
                </div>
                <div class="item">
                    <label for="city">
                        استان  
                    </label>
                
                 <?= $form->field($bascket, 'stateID')->dropdownList(ArrayHelper::map(\app\models\Province::find()->all(),'id','name'),['prompt'=>'لطفا انتخاب کنید..',
                 'id'=>'state',
                 'class'=>'js-example-basic-single'
                 ])->label(false) ?>
             
                </div>
                <div class="item">
                    <label for="city">
                          شهر
                    </label>
                    <?= $form->field($bascket, 'cityID')->dropdownList([],['prompt'=>'لطفا انتخاب کنید..',
                    'id'=>'city',
                    'class'=>'js-example-basic-single', 
                    'data-errormessage-value-missing'=>"لطفا انتخاب کنید",
                    ])->label(false) ?>
             
                </div>
               
                <div class="item">
                    <label for="city">
                          کد پستی
                    </label>  
              <?= $form->field($bascket, 'postalCode')->textInput(['pattern'=>'\d{10}' ,'value' => !empty($lastOrderInfo->postalCode) ? $lastOrderInfo->postalCode: ''])->label(false)->hint('لطفا زبان سیستم خود را انگلیسی کنید')  ?>
                    
                </div>
                <div class="item address-item">
                    <label for="address">
                        نشانی گیرنده محصول
                    </label> 
                     
                    <?= $form->field($bascket, 'address')->textarea(['class'=>'address','value'=>(isset($address->address))?$address->address:!empty($lastOrderInfo->address) ? $lastOrderInfo->address : ''])->label(false) ?>
                 
                </div>
                <div class="item">
                    <label for="tel">
                        شماره تماس
                    </label> 
                    <?= $form->field($bascket, 'tel')->textInput(['value'=>!empty($user->tell) ? $user->tell : !empty($lastOrderInfo->tel) ? $lastOrderInfo->tel : ''])->label(false) ?>
                </div>
                <div class="item">
                    <label for="phone">
                        شماره همراه
                    </label>
                    <?= $form->field($bascket, 'mobile')->textInput(
                        [
                            'value'=>$user->mobile,
                            'placeholder' => 'شماره همراه خود  را وارد کنید . . .',
                            'required'=>'required',
                            'pattern'=>'^(^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$)|((\+98|0)?9\d{9})$',
                            'title'=>'لطفا موبایل خود را صحیح وارد کنید',
                            'oninvalid'=>'this.setCustomValidity("لطفا موبایل  خود را صحیح وارد کنید")',
                            'oninput'=>'this.setCustomValidity("")']
                    )->label(false) ?>
                </div>
             
                <div class="item">
                    <label for="comment">
                        اگر پیشنهاد و انتقادی دارید یادداشت کنید ...
                    </label><br>
                    <?= $form->field($bascket, 'description')->textarea(['class'=>'address']) ->label(false)?>
                </div>
                <div class="item">
                <a href="/login">
                    <label class="new">
                        <!-- <input type="checkbox"  class="self" name="new" value="new" id="new" checked="checked"> -->
                        
                        <!-- <span class="checkmark2"></span> -->
                        آیا میخواهید اکانت کاربری جدید بسازید ؟
                    </label>
                    </a>
                </div>
                <?php  $sumcount = 0;
                                $str = 0;
                               
                                    foreach($cartoptions as $request){
                                     if($request->cartID==$carts->id){
                                         $str = $request->count;
                                         $sumcount += $str;
                                    }
                                }?>
                  <?php   $sum= 0;
                                $strsum= 0; 
                                    foreach($cartoptions as $request){
                                     if($request->cartID==$carts->id){
                                         $strsum = $request->amount*$request->count;
                                         $sum += $strsum;
                                    }
                                } ?>
                                 <?php  
                            //      $text='';
                            //     foreach($carts as $cart){
                            //         foreach($cartoptions as $request){
                            //          if($request->cartID==$cart->id){
                            //             $text.='-'.$request->product->name.'-';
                            //         }
                            //     }
                            // }


                    //              foreach($carts as $cart){
                    //                 foreach($cartoptions as $request){
                    //                  if($request->cartID==$cart->id){
                    //                    // $text[$request->productID]=$request->productID;
                    //                    echo $form->field($bascket, 'nameproduct[]')->hiddenInput(['value' =>$request->productID])->label(false);
                    //                 }
                    //             }
                    //         }
                    //   // var_dump($text);exit;
                            ?>
                    <?= $form->field($bascket, 'cartID')->hiddenInput(['value' =>$carts->id])->label(false) ?>
                    <?= $form->field($bascket, 'authority')->hiddenInput(['value' =>rand(1000,5000)])->label(false) ?>
                    <?= $form->field($bascket, 'refID')->hiddenInput(['value' =>rand(600,9000)])->label(false) ?>
                    <?= $form->field($bascket, 'count')->hiddenInput(['value' =>$sumcount])->label(false) ?>
              
                   


        </section>
        <section class="information-product col-lg-6 col-sm-12 col-12 p-0">
            <div class="slider">
                <div class="sync3">
                    <div id="sync3" class="owl-carousel owl-theme">
                <?php    
                            foreach($cartoptions as $cartoption){
                            if($cartoption->cartID==$carts->id){ 
                                    foreach($products as $product){
                                        if($product->id==$cartoption->productID){  ?>
                        <div class="item">
                            <img  src="/<?=$product->productimgs->img ?>" alt="">
                        </div>
                        <?php }  } } }   ?>
                    </div>
                    <div class="nav" id="nav-detail-product">

                    </div>
                </div>
                <div class="sync4">
                    <div id="sync4" class="owl-carousel owl-theme">
                    <?php  
                    foreach($cartoptions as $cartoption){
                        if($cartoption->cartID==$carts->id){ 
                              foreach($products as $product){
                                     if($product->id==$cartoption->productID){  ?>
                        <div class="item"> 
                            <img src="/<?=$product->productimgs->img ?>" alt=""> 
                        </div>
                        <?php }  } } }     ?>
                    </div>
                </div>
            </div>
            <div class="details-order">
                <span class="title">
                    جزئیات سفارش شما
                </span>

                <table>
                    <tr>
                        <td  class="name-header">
                            نام محصول
                        </td>
                        <td class="number-header">
                            تعداد

                        </td>
                        <td class="price-header">
                            مبلغ
                        </td>
                    </tr>
            <?php  
                    foreach($cartoptions as $cartoption){
                        if($cartoption->cartID==$carts->id){ 
                              foreach($products as $product){
                                     if($product->id==$cartoption->productID){ 
                                                $sum= \app\models\Cartoption::find()->Where(['cartID'=>$carts->id])->sum('amount*count');
                                                $sumcount= \app\models\Cartoption::find()->Where(['cartID'=>$carts->id])->sum('count');  ?>
                    <tr>
                        <td  class="name"><?=$product->name.' - سایز  '?>
                        <?php if(\app\models\Featurevalue::find()->Where(['productID'=>$product->id])->all()){
                         foreach(\app\models\Fvoption::find()->Where(['cartoptionID'=>$cartoption->id])->all() as $foption){
                                echo $foption->featurev->value;
                        } } ?></td>
                        <td class="number"><?=$cartoption->count?></td>
                        <td class="price"> <?=$cartoption->amount*$cartoption->count?></td>
                    </tr>
                  <?php }   }   }  }  ?>
                </table> 
               

                
                <!-- <form action="#" class="off"> -->
                    <div class="item item-off">
                        <label for="off">
                            اعمال کد تخفیف
                        </label>
                        <span class="d-flex"> 
                        <!-- <input type="text" id="off"> --> 
                        <?=$form->field($bascket, 'discount')->textInput(['id'=>'off','value'=>''])->label(false)?>
                        <a id="btn_offer" class="btn" style="    width: 34px; height: 34px; position: absolute;left: 6px;border-radius: 50%;top: 34px; display: flex; background-color:#a3cced; justify-content: center; align-items: center;}">
                            <i class="icon-add" style="height: 15px;font-size: 15px;"></i>
                        </a> 
                        </span>
                        <span class="" style="color:red;display:none;" id="offerone" > لطفا کد تخیف را وراد نمایید</span>
                        <span class="" style="color:red;display:none;" id="offertow">  کد تخیف صحیح نمی باشد</span>
                        <span class="" style="color:green;display:none;" id="offerthree">  کد تخفیف وارد شده صحیح است </span>
                    </div>
                    <div class="item item-member">
                        <label for="member" class="member">
                            شماره 16 رقمی کارت باشگاه مشتریان
                        </label>
                        <div class="d-flex">
                            <!-- <input class="member" type="text" id="member"> -->
                             <?=$form->field($bascket, 'memeber')->textInput(['id'=>'member','class'=>'member','value'=>''])->label(false) ?>
                            <button class="btn member">
                                <i class="icon-add"></i>
                            </button>

                        </div>
                    </div>
                 
<!--               
                </form> -->
             
                <div class="deliver" >
                    <span class="title">
                    نحوه ارسال<?php if($sum >100000){?>(ارسال برای  خرید بالای 100 تومان رایگان است)<?php } ?>
                    </span>
                    <div class="d-flex flex-wrap">
                    <?php foreach($express as $send){ ?>
                        <div class="w-100 d-flex">
                        <?php if($send->id==3){  ?>
                        <input type="radio" class="expressx" name="express" value="<?=$send->id?>" id="3" style="display:none"  >
                        <?php }else{ 
                            if($send->id==1){?>
                        <input type="radio" class="expressx" name="express" value="<?=$send->id?>" id="<?=$send->id?>"  required="required"  oninvalid="this.setCustomValidity('لطفا انتخاب کنید')" oninput="setCustomValidity('')"    >
                        <?php }elseif($send->id==2){ ?>
                        <input type="radio" class="expressx" name="express" value="<?=$send->id?>" id="<?=$send->id?>"   >
                        <?php } }?>
                        <?php if($send->id==3){  ?>
                            <label for="post3"> 
                            <?=$send->send?>
                                ( رایگان )
                            </label>
                        <?php }else{ ?>
                            <label for="post<?=$send->id?>">
                                <?=$send->send?>
                                <?php if($sum > 100000){?> (رایگان)<?php }else{?> ( <?=$send->price ?> تومان )<?php } ?>
                            </label>
                        </div>
                    <?php } ?>
                    <?php } ?>
                    
                    </div>
                </div>
                <div class="information-recipient">
                <div style="display:none;" id="tabelsendtime">
                <label for="time" class="label-table" >
                    تاریخ ارسال  /  شهر تهران
                </label>
                <table>
                    <?php     
                     foreach(\app\models\Send::find()->Where(['status'=>1])->all() as $time){    ?> 
                        <tr>
                        <td> <?=$time->date?> </td>
                        <?php if($time->date==Yii::$app->jdate->date('Y/m/d') ){ ?>
                        <td>
                            <input type="radio" class="day" name="day" value="day" id="<?=$time->id?>" disabled >
                            <label for="<?=$time->id?>" style="color:lightgray;">ساعت <?=$time->time1?> </label>
                        </td>
                        <?php }else{
                               $countsend=\app\models\Bascket::find()->Where(['submitDate'=>Yii::$app->jdate->date('Y/m/d')])->andWhere(['timeID'=>1])->count(); 
                                if($countsend<=$time->count1 && $time->count1>0){
                            ?>
                            <td>
                            <input type="radio" class="day" name="day" value="1-<?=$time->date?>" id="<?=$time->id?>" >
                            <label for="<?=$time->id?>">ساعت <?=$time->time1?> </label>
                            </td>
                            <?php }else{ ?>
                              <td>
                            <input type="radio" class="day" name="day" value="1-<?=$time->date?>" id="<?=$time->id?>" disabled>
                            <label for="<?=$time->id?>" style="color:lightgray;">ساعت <?=$time->time1?> </label>
                            </td>
                            <?php } ?>
                        <?php } ?>
                        <?php   $countsend=\app\models\Bascket::find()->Where(['submitDate'=>Yii::$app->jdate->date('Y/m/d')])->andWhere(['timeID'=>2])->count(); 
                                if($countsend<=$time->count2 && $time->count2>0){?>
                        <td>
                            <input type="radio" class="day" name="day" value="2-<?=$time->date?>" id="time<?=$time->id?>" >
                            <label for="time<?=$time->id?>">ساعت <?=$time->time2?></label>
                        </td>
                                <?php }else{ ?>
                        <td>
                            <input type="radio" class="day" name="day" value="2-<?=$time->date?>-2" id="time<?=$time->id?>" disabled>
                            <label for="time<?=$time->id?>" style="color:lightgray;">ساعت <?=$time->time2?></label>
                        </td>
                                <?php } ?>
                    </tr>
                    <?php } ?>

                </table>
                </div>
                </div>
                <div class="factor ">
                      <span class="title">
                        فاکتور نهایی
                    </span>
                    <div class="d-flex justify-content-between">
                        <span class="total-product">
                        مجموع محصولات
                    </span>
                        <span class="number">  
                        <?php  $sumcount = 0;
                                $str = 0;
                                
                                    foreach($cartoptions as $request){
                                     if($request->cartID==$carts->id){ 
                                         $str = $request->count;
                                         $sumcount += $str;
                                    }
                                }
                            
                            echo $sumcount; ?>عدد
                    </span>
                        <span class="price">
                        <?php  $sum= 0;
                                $strsum= 0;
                                
                                    foreach($cartoptions as $request){
                                     if($request->cartID==$carts->id){ 
                                         $strsum = $request->amount*$request->count;
                                         $sum += $strsum;
                                    }
                                }
                            
                            echo number_format($sum); ?> تومان
                    </span>
                    </div>
                    <br> 
                        <?php if($off=\app\models\Off::find()->Where(['status'=>1])->orderBy(['id'=>SORT_DESC])->one()){ ?>
                            <div style="height: 50px;  background-color: #ed008c; border-radius: 50px;">
                    <div class="d-flex justify-content-between">
                        <span class="total-product" style="color:white!important;padding:10px;font-size:18px;">
                      سود شما
                    </span>
                        <span class="number">   </span>
                        <span class="price" style="color:white!important;padding:10px;font-size:18px;">
                        <?php  
                        $offsum= 0;
                        $offstrsum= 0;
                        
                            foreach($cartoptions as $request){
                             if($request->cartID==$carts->id){ 
                                 $offstrsum = $request->off*$request->count;
                                 $offsum += $offstrsum;
                            }
                        }
                            $offer=($offsum*$off->percent)/100;
                             
                            echo number_format($offer); ?> تومان
                    </span>
                    </div>
                    </div>
                    <br>
                   
                            <?php } ?>
                    <div class="d-flex justify-content-between">
                        <span class="total-product">
                         هزینه ارسال
                    </span>
                        <span class="number" id="pricesend" > <?=( $sum > 100000)?'0':'' ?>  </span> 
                        <span class="price number" id="priceall">
                        <?php echo number_format($sum); ?> تومان
                    </span>
                    <input type="hidden"  id="sumexpress" value="<?=$sum?>">
                    <input type="hidden" id="oneexpress" name="sunmamount" value="<?=$sum?>">
                    </div>
                   
                </div>
                <label class="item" style=" width: 100%;display: flex;align-items: center;margin-top: 20px;display:none;" id="place">
                            <input type="checkbox" name="place" value="1" id="payplace" style="width: 10px;height: 10px;margin-left: 10px;">
                            پرداخت در محل
          </label>
                <div class="bank">
                    <!-- <span class="title">
                        اتصال به درگاه بانک
                    </span>
                  -->
                    <div  class="banks-logos d-flex align-items-center justify-content-between">
                        <div class="logos">
                            <!-- <input  type="radio" name="bank" value="melli" id="psg" >

                            <label for="psg" class="bank-logo">
                                <img src="/img/bank/melli.png" class="bank-logo active" alt="">
                            </label>-->
                            

                            <input type="radio" name="bank" value="zarinpal" id="zarin"  checked>

                            <label for="zarin" class="bank-logo">
                                <img src="/img/zarinpal-logo-2.png" class="bank-logo active" alt="">
                            </label>

                        </div>
                      <!-- Html::a('پرداخت در محل ', ['name'=>'payplace','class' => 'btn payment']) ?> -->
                        <!-- <?= Html::submitButton('پرداخت در محل', ['name'=>'payplace','value'=>1,'class' => 'btn payment']) ?> -->
                        <?= Html::submitButton('ثبت و پرداخت', ['class' => 'btn payment']) ?>
                        <!-- Html::submitButton('پرداخت در محل  ', ['name'=>'payplace','class' => 'btn payment']) ?> -->
                  
                        <!-- Html::a('پرداخت در محل   ', ['href'=>'/site/notificationpay','name'=>'payplace','class' => 'btn payment']) ?> -->
                       
                    </div>
                        <!-- <button type="submit" class="btn payment">
                            پرداخت نهایی
                        </button> -->
<?php ActiveForm::end(); ?>

                </div>
            </div>
        </section>
    </div>
    <!-- </form> -->
<?php
$script = <<< JS
 
function ToRial(str) {

var objRegex = new RegExp('(-?[0-9]+)([0-9]{3})');

while (objRegex.test(str)) {
    str = str.toString().replace(objRegex, '$1,$2');
}

return str;
} 
jQuery('#state').change(()=>{
    var html='';
    $.get("/api/city/"+jQuery('#state').val()).done((data,status)=>{
      console.log(data);
      console.log(status);
      
      html+='<option>لطفا انتخاب کنید..</option>';
      $.each(data.data, function(index, value) {
        console.log(index);
        console.log(value);
        html+='<option value="'+value.id+'">'+value.name+'</option>';
      });
      $('#city').html(html);
     
    });      
});
 
  
JS;
$this->registerJs($script);
?>
<?php
$script = <<< JS

jQuery('#city').change(()=>{
    if($('#city').val()==117){ 
        $('#3').show();
        $('#place').show();
    }else{ 
        $('#3').hide();
        $('#place').hide();
    }   
}); 

jQuery('#state').change(()=>{
    if($('#state').val()!=8){ 
        $('#3').hide();
        $('#place').hide();
  }  
}); 
 
  
JS;
$this->registerJs($script);
?>



<?php
$script = <<< JS
 
  
    $('#3').change(function(){
        if ($(this).is(':checked')) {
        $('#tabelsendtime').show(); 
        }
   
});
$('#1').change(function(){
        if ($(this).is(':checked')) {
        $('#tabelsendtime').hide(); 
        }
   
});
$('#2').change(function(){
        if ($(this).is(':checked')) {
        $('#tabelsendtime').hide(); 
        }
   
});

JS;
$this->registerJs($script);
?>


<?php
$script = <<< JS

$('#payplace').change(function()
      {
        if ($(this).is(':checked')) { 
            $('#1').hide();
             $('#2').hide();
             $('#1').prop('checked', false);
             $('#2').prop('checked', false);
             $('#3').prop('checked', true);
             $('#pricesend').html(''); 
             $('#priceall').html(''); 
             
       
        }else{
            $('#1').show();
             $('#2').show();
        };
      });
  

  
JS;
$this->registerJs($script);
?>


<?php
$script = <<< JS
 

$(".expressx").click(function(){  
    var html='';
    $.get("/api/express/"+$('input[name=express]:checked').val()).done((data,status)=>{
      console.log(data);
      console.log(status);
      $.each(data.data, function(index, value) {
      
        html+='<span class="number">'+ToRial(value.price)+'    تومان</span>'; 
        var b=0;

        if(parseInt($("#sumexpress").val())>100000){
    b= parseInt($("#sumexpress").val())+parseInt(0); 
      $("#oneexpress").attr({
            "value" : +b,  
            }); 
            $('#pricesend').html('رایگان'); 
}else{
    b= parseInt($("#sumexpress").val())+parseInt(value.price); 
      $("#oneexpress").attr({
            "value" : +b,  
            }); 
            $('#pricesend').html(html); 
}
       
      $('#priceall').html(ToRial(b)+'تومان'); 
    console.log(b);
       }); 
       ConvertNumberToPersion();
     });
   
    });




JS;
$this->registerJs($script);
?>

<?php
$script = <<< JS

second = function () {
$(".expressx").click(function () { 
    var html='';
    console.log($('#oneexpress').val());
   
 var a =parseInt($('#oneexpress').val());    
 var b =parseInt($('#sumexpress').val());   
     var sum = a + b;
     console.log(sum);
     html+='<span class="number">'+ConvertNumberToPersion(sum)+'</span>';  
     $('#priceall').html(html);  
    });

}
     

JS;
$this->registerJs($script);
?>





<?php
$script = <<< JS
 var html="";
 jQuery("#btn_offer").click(()=>{
    //  alert($('#off').val());
    if($('#off').val()==''){
        $('#offerone').show();
        $('#offertow').hide();
        $('#offerthree').hide();
    }else{
        $.get("/api/offer/check?code="+$('#off').val(), function(data, status){
            console.log(data);
            console.log(status);
            if(data.status==true){ 
                $('#offerone').hide();
                $('#offertow').hide();
                $('#offerthree').show();
                $.each(data.data, function(index, value) {
                    var a=+value.percent;
                    console.log(a);  
                    var b=$('#oneexpress').val();
                    console.log(b);
                    var d=parseInt(b)-(parseInt(b))/parseInt(a);
                    console.log(d); 
                    html+='<span class="number">'+d+'    تومان</span>'; 
                    $('#priceall').html(html); 
                    
                    console.log(b);
                    
               
                });
            
            }else if(data.status==false){
                $('#offerone').hide(); 
                $('#offerthree').hide();
                $('#offertow').show();
               
            }
           
            ConvertNumberToPersion();
        });
    }
   
 });


jQuery('#off').change(()=>{   
    if($('#off').val()=='' ){
        $("#member").prop('disabled', false); 
    }else{
$("#member").prop('disabled', true); 
    }
});

jQuery('#member').change(()=>{  
    if($('#member').val()=='' ){
        $("#off").prop('disabled', false);  
    }else{
    $("#off").prop('disabled', true);  
    }
});
// if(('#off').val()===null && ('#member').val()===null){
//     $("#member").prop('disabled', false); 
//     $("#off").prop('disabled', false); 
// }

JS;
$this->registerJs($script);
?>

<!-- // var a=+value.percent;
                // console.log(a);
                // $('#offerone').hide();
                // $('#offertow').hide();
                // $('#offerthree').show();
            //    var b=$('#priceall').val();
            //    var c= a*b; 
            //    var d= c-b;
            //    $("#priceall").attr({
            //      "value" : +d,  
            // });   -->