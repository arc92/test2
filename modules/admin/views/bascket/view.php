<?php

use app\models\Users;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Bascket */
$this->title = $model[0]->name.'  '. $model[0]->family ;
$this->params['breadcrumbs'][] = ['label' => 'Basckets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="bascket-view" id='outprint'>

    <h1><?= Html::encode($this->title) ?></h1>

    <p> 
    
      
    </p>
   
    <?= DetailView::widget([
       
        'model' => $model,
        'attributes' => [
            //'id',
            //'cartID',
     
//     [
//         'attribute'=>'سایز بندی',
//         'value'=>function($model){
//             $cartoptions=\app\models\Cartoption::find()->Where(['cartID'=>$model->cartID])->all();  
//             $value='';
//             foreach($cartoptions as $cartoption){
//                 foreach(\app\models\Fvoption::find()->all() as $fvoption){
//                     if($fvoption->cartoptionID==$cartoption->id){
//                          $value.=$fvoption->featurev->value.'-';
                        
//                     }
//                  }
//              } 
//              return $value;  
            
//         }
// ],
            
            [
                'attribute'=>'submitDate',
                'format'=>'raw',
                'value'=>function($model){ 
                        return '<h1>'.$model[0]->submitDate.'</h1>';
                        }
            ],
         
            [
                'attribute'=>'refID',
                'format'=>'raw',
                'value'=>function($model){ 
                        return '<h1>'.$model[0]->refID.'</h1>';
                        }
            ],
            [
                'attribute'=>'نام کاربر',
                'format'=>'raw',
                'value'=>function($model){
                        $cart=$model[0]->cart;
                        if(isset($cart)){
                        $user= Users::find()->Where(['id'=>$cart->userID])->one();
                        return '<h1>'.$user->fullName.'</h1>';
                        }
                   
                }
            ],
           
            [
                'attribute'=>'amount',
                'format'=>'raw',
                'value'=>function($model){ 
                        return '<h1>'.$model[0]->amount.'</h1>';
                        }
            ],
            [
                'attribute'=>'cartID',
                'format'=>'raw',
                'value'=>function($model){
                    $sample='';
                    $count=1;
                    $cartoptions= $model[0]->cart->cartoptions;
                    foreach($cartoptions as $cartoption){
                        foreach($cartoption->product as $product){
                                if($product->featurevalues){
                                    foreach ($product->featurevalues as $featurevalue)
                                foreach($featurevalue->fvoptions as $fvoption){
                                    if($fvoption->cartoptionID==$cartoption->id){
                                  $sample.="<hr>".$count.' : '.$product->name.'<br><br> سایز:'.$fvoption->featurev->value .' <br><br>تعداد :  '.$cartoption->count.' عدد '."<hr>";
                                $count++;
                                    }
                                }
                            }else{
                                $sample.="<hr>".$count.' : '.$product->name."<br><br>   تعداد: ".$cartoption->count.' عدد '."<hr>"; 
                                $count++;
                            }
                        }
                    }  
                    return '<h1>'.$sample.'</h1>';                     
        }
    ],
            [
                'attribute'=>'recived',
                'format'=>'raw',
                'value'=>function($model){
                    if ($model[0]->recived==1){
                        return '<h1>'."بله".'</h1>';
                    }elseif ($model[0]->recived==0){
                        return '<h1>'."خیر".'</h1>';
                    }
                }
            ],
          //  'name',
            [
                'attribute'=>'name',
                'format'=>'raw',
                'value'=>function($model){ 
                        return '<h1>'.$model[0]->name.'</h1>';
                        }
            ],
            
            //'family',
            [
                'attribute'=>'family',
                'format'=>'raw',
                'value'=>function($model){ 
                        return '<h1>'.$model[0]->family.'</h1>';
                        }
            ],
           // 'stateID',
            [
                'attribute'=>'stateID',
                'format'=>'raw',
                'filter'=> ArrayHelper::map(\app\models\Province::find()->all(), 'id','name'),
                'value'=>function($model){ 
                    if($model[0]->stateID!=null || $model[0]->stateID!=0){
                    return '<h1>'.$model[0]->state->name.'</h1>';
                    }
            }
            ],
            //'cityID',
            [
                'attribute'=>'cityID',
                'format'=>'raw',
                'filter'=> ArrayHelper::map(\app\models\City::find()->all(), 'id','name'),
                'value'=>function($model){
                    if($model[0]->cityID!=null || $model[0]->cityID!=0){
                    return '<h1>'.$model[0]->city->name.'</h1>';
                    }
                }
            ],
         //   'address:ntext', 
            [
                'attribute'=>'address',
                'format'=>'raw', 
                'value'=>function($model){
                    return '<h1>'.$model[0]->address.'</h1>';
            }
            ],
            //'tel',
            [
                'attribute'=>'tel',
                'format'=>'raw',
                'value'=>function($model){ 
                        return '<h1>'.$model[0]->tel.'</h1>';
                        }
            ],
           // 'mobile',
            [
                'attribute'=>'mobile',
                'format'=>'raw',
                'value'=>function($model){ 
                        return '<h1>'.$model[0]->mobile.'</h1>';
                        }
            ],
            //'postalCode',
            [
                'attribute'=>'postalCode',
                'format'=>'raw',
                'value'=>function($model){ 
                        return '<h1>'.$model[0]->postalCode.'</h1>';
                        }
            ],
           // 'day',
            [
                'attribute'=>'day',
                'format'=>'raw',
                'value'=>function($model){ 
                        return '<h1>'.$model[0]->day.'</h1>';
                        }
            ],
            //'timeID',
            [
                'attribute'=>'timeID', 
                'format'=>'raw',
                'value'=>function($model){
                    if($model[0]->timeID!=0 && $model[0]->timeID==1){
                    return '<h1>'."ساعت ارسال صبح".'</h1>';
                    }elseif($model[0]->timeID!=0 && $model[0]->timeID==2){
                        return '<h1>'."ساعت ارسال بعد از ظهر".'</h1>';
                }
            }
            ],
            [
                'attribute'=>'expressID',
                'format'=>'raw',
                'filter'=> ArrayHelper::map(\app\models\Expresssend::find()->all(), 'id','send'),
                'value'=>function($model){
                    if($model[0]->expressID!=null || $model[0]->expressID!=0){
                    return '<h1>'.$model[0]->express->send.'</h1>';
                    }
            }
            ],
        //     [
        //         'attribute'=>'محصولات', 
        //         'format'=>'raw',
        //         'value'=>function($model){
        //            foreach(\app\models\Checkbuy::find()->Where(['bascketID'=>$model[0]->id])->all() as  $checkbuy){
        //             $cartoptions=\app\models\Cartoption::find()->Where(['cartID'=>$checkbuy->cartID])->all(); 
        //             $sample='';
        //             $count=1;
        //             foreach($cartoptions as $cartoption){
        //                 foreach(\app\models\Product::find()->all() as $product){
        //                     if($product->id==$cartoption->productID){
        //                         if(\app\models\Featurevalue::find()->Where(['productID'=>$product->id])->all() ){
        //                         foreach(\app\models\Fvoption::find()->all() as $fvoption){
        //                             if($fvoption->cartoptionID==$cartoption->id){
        //                           $sample.="<hr>".$count.' : '.$product->name.'<br><br> سایز:'.$fvoption->featurev->value .' <br><br>تعداد :  '.$cartoption->count.' عدد '."<hr>"; 
        //                         $count++;
        //                             } 
        //                         }
        //                     }else{
        //                         $sample.="<hr>".$count.' : '.$product->name."<br><br>   تعداد: ".$cartoption->count.' عدد '."<hr>"; 
        //                         $count++;
        //                     }
        //                     }
        //                 }
        //             }  
        //             return $sample;                     
        // }
        //            }
        //             return $product; 
        //             }
        //     }
        //     ],
           // 'discount:ntext',
          
            //'discount',
            [
                'attribute'=>'discount',
                'format'=>'raw', 
                'value'=>function($model){
                    return '<h1>'.$model[0]->discount.'</h1>';
            }
            ],
         //   'memeber',
            [
                'attribute'=>'memeber',
                'format'=>'raw', 
                'value'=>function($model){ 
                    return '<h1>'.$model[0]->memeber.'</h1>';
            }
            ],
           // 'authority',
           
          //  'count',
      
           
           // 'status',
            [
                'attribute'=>'وضعیت پرداخت', 
                'format'=>'raw',
                'value'=>function($model){
                    if ($model[0]->status==1){
                        return '<h1>  پرداخت شده</h1>';
                    }elseif ($model[0]->status==0){
                        return 'پرداخت نشده';
                    }elseif ($model[0]->status==2){
                        return 'پرداخت در محل';
                    }
                }
            ],
            [
                'attribute'=>'بانک', 
                'format'=>'raw',
                'value'=>function($model){
                    if ($model[0]->bank=="melli"){
                        return '<h1>'."ملی".'</h1>';
                    }elseif ($model[0]->bank=='mellat'){
                        return '<h1>'."ملت".'</h1>';
                    }elseif ($model[0]->bank=='zarinpal'){
                        return '<h1>'."زرین پال".'</h1>';
                    }
                }
            ],
            [
                'attribute'=>'description', 
                'format'=>'raw',
                'value'=>function($model){
                        return '<h1>'.$model[0]->description.'</h1>';
                  
                }
            ],
            
        // 'description',
           // 'condition',
            // [
            //     'attribute'=>'condition',
            //     'value'=>function($model){
            //         if ($model[0]->condition==1){
            //             return 'در حال بررسی';
            //         }elseif ($model[0]->condition==2){
            //             return ' تایید سفارش';
            //         }elseif ($model[0]->condition==3){
            //             return '  ارسال شده';
            //         }elseif ($model[0]->condition==3){
            //             return ' وضعیت نهایی ';
            //         }
            //     }
            // ],
            // 'commentadmin',
            // 'sendDate', 
        ],
    ]) ?>

</div>

<?= Html::submitButton('چاپ', ['class' => 'btn btn-primary printMe','style'=>'float:left;']) ?> 
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script>

$('.printMe').click(function(){ 

var divToPrint=document.getElementById('outprint');

var newWin=window.open('','Print-Window');

newWin.document.open();


newWin.document.write('<html style="direction: rtl !important;"><head><title>چاپ فاکتور</title> <link href="/panel/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="/css/bootstrap-glyphicons.css" rel="stylesheet"><link href="/panel/plugins/bootstrap-rtl-master/dist/css/custom-bootstrap-rtl.css" rel="stylesheet"><link href="/panel/css/styleMain.css" rel="stylesheet"><link href="/panel/css/ticket.css" rel="stylesheet"><link href="/panel/css/colors/blue.css" rel="stylesheet"></head><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');


newWin.document.close();

setTimeout(function(){newWin.close();},10);

});


</script>