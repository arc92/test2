<?php

namespace app\controllers;

use app\models\Bascket;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use \app\models\Cart;
use \app\models\Cartoption;
use \app\models\Fvoption;
use \app\models\Product;
use \app\models\Productimg;
use hoomanMirghasemi\jdf\Jdf;

class EndstepController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()
    {
        $setting = \app\models\Setting::find()->orderBy(['id' => SORT_DESC])->one();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $setting->description_endstep
        ]);
        \Yii::$app->view->title = $setting->title_endstep;

        date_default_timezone_set("Asia/tehran");

        if (\yii::$app->users->is_loged() == false) {
            \yii::$app->session['afterpage'] = "yes";
            return $this->redirect('/login');
        }
        $carts = Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 0])->andWhere(['submitDate' => Yii::$app->jdate->date('Y/m/d')])->one();
        $user = \app\models\Users::find()->Where(['id' => \yii::$app->session['user_id']])->one();
        $cartoptions = Cartoption::find()->all();
        $products = Product::find()->all();

        //for getting address from latest user order
        $lastSuccessfulCart = Cart::find()->Where(['userID' => \Yii::$app->session['user_id']])->andWhere(['status' => 1])->orderBy(['id' =>SORT_DESC])->one();
        if(!empty ($lastSuccessfulCart)){
            $lastOrderInfo = Bascket::find()->where(['cartID' => $lastSuccessfulCart->id])->orderBy(['id' => SORT_DESC])->one(); //for getting address from latest user order
        } else{
            $lastOrderInfo = [];
        }



        $imgs = Productimg::find()->all();
        $img = Productimg::find()->one();
        $express = \app\models\Expresssend::find()->all();
        if ($carts == false) {
            return $this->redirect('/site/index');
        } else {
            $cartoptionss = Cartoption::find()->where(['cartID' => $carts->id])->all();
            foreach ($cartoptionss as $cartoption) {
                foreach (\app\models\Product::find()->all() as $product) {
                    if ($product->id == $cartoption->productID) {
                        if ($x = \app\models\Fvoption::find()->Where(['cartoptionID' => $cartoption->id])->andWhere(['not', ['featurevID' => null]])->one()) {
                            if ($num = \app\models\Featurevalue::find()->Where(['id' => $x->featurevID])->one()) {
                                if ($cartoption->count > $num->count && $num->count > 0) {
                                    Yii::$app->session->setFlash('error', "  تعداد درخواستی شما برای محصول  $product->name   موجود نمی باشد!!");
                                    $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                    $cartoptioncount->count = $num->count;
                                    if ($cartoptioncount->save()) {
                                        return $this->redirect('/cart/');
                                    }
                                } elseif ($num->count == 0 || $num->count < 0) {
                                    Yii::$app->session->setFlash('error', "  سبد خرید شما تغییر کرده است. این محصول  $product->name   موجود نمی باشد!!");
                                    $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                    $cartoptioncount->delete();
                                    return $this->redirect('/cart/');
                                }
                            }
                        } else {
                            if ($cartoption->count > $product->count && $product->count > 0) {
                                Yii::$app->session->setFlash('error', "  تعداد درخواستی شما برای محصول  $product->name   موجود نمی باشد!!");
                                $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                $cartoptioncount->count = $product->count;
                                if ($cartoptioncount->save()) {
                                    return $this->redirect('/cart/');
                                }
                            } elseif ($product->count == 0) {
                                Yii::$app->session->setFlash('error2', "  سبد خرید شما تغییر کرده است.  محصول  $product->name   موجود نمی باشد!!");
                                $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                $cartoptioncount->delete();
                                return $this->redirect('/cart/');
                            }
                        }
                    }
                }
            }
            $province = \app\models\Province::find()->all();
            $city = \app\models\City::find()->all();
            $timesend = \app\models\Timesend::find()->all();
            $bascket = new \app\models\Bascket();

            ///pay in place
            if ($bascket->load(Yii::$app->request->post()) && Yii::$app->request->post('place')) {
                $cartoptionss = Cartoption::find()->where(['cartID' => $carts->id])->all();
                foreach ($cartoptionss as $cartoption) {
                    foreach (\app\models\Product::find()->all() as $product) {
                        if ($product->id == $cartoption->productID) {
                            if ($x = \app\models\Fvoption::find()->Where(['cartoptionID' => $cartoption->id])->andWhere(['not', ['featurevID' => null]])->one()) {
                                if ($num = \app\models\Featurevalue::find()->Where(['id' => $x->featurevID])->one()) {
                                    if ($cartoption->count > $num->count && $num->count > 0) {
                                        Yii::$app->session->setFlash('error', "  تعداد درخواستی شما برای محصول  $product->name   موجود نمی باشد!!");
                                        $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                        $cartoptioncount->count = $num->count;
                                        if ($cartoptioncount->save()) {
                                            return $this->redirect('/cart/');
                                        }
                                    } elseif ($num->count == 0 || $num->count < 0) {
                                        Yii::$app->session->setFlash('error', "  سبد خرید شما تغییر کرده است. این محصول  $product->name   موجود نمی باشد!!");
                                        $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                        $cartoptioncount->delete();
                                        return $this->redirect('/cart/');
                                    }
                                }
                            } else {
                                if ($cartoption->count > $product->count && $product->count > 0) {
                                    Yii::$app->session->setFlash('error', "  تعداد درخواستی شما برای محصول  $product->name   موجود نمی باشد!!");
                                    $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                    $cartoptioncount->count = $product->count;
                                    if ($cartoptioncount->save()) {
                                        return $this->redirect('/cart/');
                                    }
                                } elseif ($product->count == 0) {
                                    Yii::$app->session->setFlash('error2', "  سبد خرید شما تغییر کرده است.  محصول  $product->name   موجود نمی باشد!!");
                                    $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                    $cartoptioncount->delete();
                                    return $this->redirect('/cart/');
                                }
                            }
                        }
                    }
                }

                $amount = intval(yii::$app->request->post('sunmamount'));
                $recived = (yii::$app->request->post('recived'));
                if (yii::$app->request->post('day')) {
                    $datetime = explode("-", yii::$app->request->post('day'));
                    $bascket->timeID = $datetime[0];
                    $bascket->day = $datetime[1];
                }
                if (yii::$app->request->post('express')) {
                    $bascket->expressID = yii::$app->request->post('express');
                }
                $bascket->recived = $recived;
                $bascket->status = 2;
                $bascket->amount = $amount;
                if (yii::$app->request->post('bank') == null || empty(yii::$app->request->post('bank'))) {
                    $_bank = "mellat";
                } else {
                    $_bank = yii::$app->request->post('bank');
                }

                $bascket->bank = "پرداخت در محل";
                $bascket->submitDate = Yii::$app->jdate->date(' H:i:s ـــ Y/m/d');
                if ($bascket->save()) {
                    $cartitem = \app\models\Cart::find()->Where(['id' => $bascket->cartID])->one();
                    $cartitem->status = 1;
                    if ($cartitem->save()) {
                        unset(\Yii::$app->session['cart_id']);
                        unset(\Yii::$app->session['guest_id']);
                        foreach (\app\models\Cartoption::find()->Where(['cartID' => $cartitem->id])->all() as $cartoption) {
                            foreach (\app\models\Product::find()->Where(['id' => $cartoption->productID])->all() as $product) {
                                if (\app\models\Featurevalue::find()->Where(['productID' => $product->id])->all()) {
                                    foreach (\app\models\Fvoption::find()->Where(['cartoptionID' => $cartoption->id])->all() as $fvoption) {
                                        $featurevalue = \app\models\Featurevalue::find()->Where(['id' => $fvoption->featurevID])->one();
                                        $featurevalue->count -= $cartoption->count;
                                        $featurevalue->save();
                                    }
                                } else {
                                    $productitem = \app\models\Product::find()->Where(['id' => $product->id])->one();
                                    $productitem->count -= $cartoption->count;
                                    $productitem->save();
                                }
                            }
                        }
                    }
                    $text = "بی سی سی : سفارش شما با موفقیت ثبت شد. شماره سفارش" . $bascket->refID;
                    \yii::$app->sms->Send($bascket->mobile, $text);
                    return $this->redirect('/thankyou/');
                } else {
                    return $this->redirect('/failed/');
                }

            } elseif ($bascket->load(Yii::$app->request->post())) {
                if (yii::$app->request->post('bank') == null || empty(yii::$app->request->post('bank'))) {
                    $_bank = "mellat";
                } else {
                    $_bank = yii::$app->request->post('bank');
                }
                $cartoptionss = Cartoption::find()->where(['cartID' => $carts->id])->all();
                foreach ($cartoptionss as $cartoption) {
                    foreach (\app\models\Product::find()->all() as $product) {
                        if ($product->id == $cartoption->productID) {
                            if ($x = \app\models\Fvoption::find()->Where(['cartoptionID' => $cartoption->id])->andWhere(['not', ['featurevID' => null]])->one()) {
                                if ($num = \app\models\Featurevalue::find()->Where(['id' => $x->featurevID])->one()) {
                                    if ($cartoption->count > $num->count && $num->count > 0) {
                                        Yii::$app->session->setFlash('error', "  تعداد درخواستی شما برای محصول  $product->name   موجود نمی باشد!!");
                                        $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                        $cartoptioncount->count = $num->count;
                                        if ($cartoptioncount->save()) {
                                            return $this->redirect('/cart/');
                                        }
                                    } elseif ($num->count == 0 || $num->count < 0) {
                                        Yii::$app->session->setFlash('error', "  سبد خرید شما تغییر کرده است. این محصول  $product->name   موجود نمی باشد!!");
                                        $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                        $cartoptioncount->delete();
                                        return $this->redirect('/cart/');
                                    }
                                }
                            } else {
                                if ($cartoption->count > $product->count && $product->count > 0) {
                                    Yii::$app->session->setFlash('error', "  تعداد درخواستی شما برای محصول  $product->name   موجود نمی باشد!!");
                                    $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                    $cartoptioncount->count = $product->count;
                                    if ($cartoptioncount->save()) {
                                        return $this->redirect('/cart/');
                                    }
                                } elseif ($product->count == 0) {
                                    Yii::$app->session->setFlash('error2', "  سبد خرید شما تغییر کرده است.  محصول  $product->name   موجود نمی باشد!!");
                                    $cartoptioncount = \app\models\Cartoption::findOne($cartoption->id);
                                    $cartoptioncount->delete();
                                    return $this->redirect('/cart/');
                                }
                            }
                        }
                    }
                }
                $amount = intval(yii::$app->request->post('sunmamount'));
                $recived = (yii::$app->request->post('recived'));
                if (yii::$app->request->post('day')) {
                    $datetime = explode("-", yii::$app->request->post('day'));
                    $bascket->timeID = $datetime[0];
                    $bascket->day = $datetime[1];
                }
                if (yii::$app->request->post('express')) {
                    $bascket->expressID = yii::$app->request->post('express');
                }
                $bascket->recived = $recived;
                $bascket->status = 0;
                $bascket->amount = $amount;
                $bascket->bank = $_bank;
                $bascket->submitDate = Yii::$app->jdate->date(' H:i:s ـــ Y/m/d');
                if ($bascket->save()) {
                    $zarinpal = Yii::$app->zarinpal;
                    $bank = $_bank;
                    $bascketID = intval($bascket->id);
                    if ($bank == 'melli') {
                        return \yii::$app->payment->melli_request($amount, time(), "https://www.bccstyle.com/endstep/callback?id=" . $bascketID);
                    } elseif ($bank == 'mellat') {
                        return \yii::$app->mellatbank->Request(1000, "https://www.bccstyle.com/endstep/backmellat?id=" . $bascketID);
                        //  return \yii::$app->payment->Request($amount,"https://www.bccstyle.com/endstep/callbackmelat?id=".intval($bascket->id));
                    } elseif ($bank == 'zarinpal') {
                        if ($zarinpal->request($amount, 'بی سی سی', null, null, ['parameter' => intval($bascket->id)])->getStatus() == '100') {
                            return $this->redirect($zarinpal->getRedirectUrl());
                        }
                    }
                } else {
                    return $this->redirect('/failed/');
                }
            }

            return $this->render('index', [
                'carts' => $carts,
                'cartoptions' => $cartoptions,
                'products' => $products,
                'img' => $img,
                'province' => $province,
                'city' => $city,
                'timesend' => $timesend,
                'bascket' => $bascket,
                'express' => $express,
                'user' => $user,
                'lastOrderInfo' => $lastOrderInfo,
            ]);

        }
    }


    public function actionBackmellat($id)
    {
        if (\yii::$app->mellatbank->Callback(\yii::$app->request->post())) {

            $model = \app\models\Bascket::find()->where(['id' => $id])->one();

            // $model->refID=\yii::$app->session['ref_code'];
            $model->status = 1;
            $model->bank = 'mellat';
            if ($model->save()) {
                $cartitem = \app\models\Cart::find()->Where(['id' => $model->cartID])->one();
                $cartitem->status = 1;
                if ($cartitem->save()) {
                    unset(\Yii::$app->session['cart_id']);
                    unset(\Yii::$app->session['guest_id']);
                    foreach (\app\models\Cartoption::find()->Where(['cartID' => $cartitem->id])->all() as $cartoption) {
                        foreach (\app\models\Product::find()->Where(['id' => $cartoption->productID])->all() as $product) {
                            if (\app\models\Featurevalue::find()->Where(['productID' => $product->id])->all()) {
                                foreach (\app\models\Fvoption::find()->Where(['cartoptionID' => $cartoption->id])->all() as $fvoption) {
                                    $featurevalue = \app\models\Featurevalue::find()->Where(['id' => $fvoption->featurevID])->one();
                                    $featurevalue->count -= $cartoption->count;
                                    $featurevalue->save();
                                }
                            } else {
                                $productitem = \app\models\Product::find()->Where(['id' => $product->id])->one();
                                $productitem->count -= $cartoption->count;
                                $productitem->save();
                            }
                        }
                    }
                }
                $user = \app\models\Users::find()->where(['id' => $cartitem->userID])->one();
                !empty($user->email) && \Yii::$app->mailer->compose('factor/index', ['model' => $model, 'user' => $user])
                    ->setFrom('info@bccstyle.com')
                    ->setTo($user->email)
                    ->setSubject(' سفارش شما با موفقیت ثبت شد. ')
                    ->send();
                $text = "بی سی سی : سفارش شما با موفقیت ثبت شد. شماره سفارش" . $model->refID;
                \yii::$app->sms->Send($model->mobile, $text);

                // return $this->redirect('/site/confirm?orderID='.$model->refID);
                return $this->redirect('/thankyou/');
            } else {

                //  echo "تراکنش نا موفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد.";
                return $this->redirect('/failpayment/');
            }
        }else{
            return $this->redirect('/failpayment/');
        }

    }

    public function actionVerify($Authority, $Status, $parameter)
    {
        if ($Status == "OK") {
            /** @var Zarinpal $zarinpal */
            $zarinpal = Yii::$app->zarinpal;
            $model = \app\models\Bascket::find()->where(['id' => $parameter])->one();
            if ($zarinpal->verify($Authority, $model->amount)->getStatus() == '100') {
                $model->authority = $Authority;
                $model->status = 1;
                $model->bank = 'zarinpal';
                if ($model->save()) {
                    $cartitem = \app\models\Cart::find()->Where(['id' => $model->cartID])->one();
                    $cartitem->status = 1;
                    if ($cartitem->save()) {
                        unset(\Yii::$app->session['cart_id']);
                        unset(\Yii::$app->session['guest_id']);
                        foreach (\app\models\Cartoption::find()->Where(['cartID' => $cartitem->id])->all() as $cartoption) {
                            foreach (\app\models\Product::find()->Where(['id' => $cartoption->productID])->all() as $product) {
                                if (\app\models\Featurevalue::find()->Where(['productID' => $product->id])->all()) {
                                    foreach (\app\models\Fvoption::find()->Where(['cartoptionID' => $cartoption->id])->all() as $fvoption) {
                                        $featurevalue = \app\models\Featurevalue::find()->Where(['id' => $fvoption->featurevID])->one();
                                        $featurevalue->count -= $cartoption->count;
                                        $featurevalue->save();
                                    }
                                } else {
                                    $productitem = \app\models\Product::find()->Where(['id' => $product->id])->one();
                                    $productitem->count -= $cartoption->count;
                                    $productitem->save();
                                }
                            }
                        }
                    }
                    $user = \app\models\Users::find()->where(['id' => $cartitem->userID])->one();
                    \Yii::$app->mailer->compose('factor/index', ['model' => $model, 'user' => $user])
                        ->setFrom('info@bccstyle.com')
                        ->setTo($user->email)
                        ->setSubject(' سفارش شما با موفقیت ثبت شد. ')
                        ->send();
                    $text = "بی سی سی : سفارش شما با موفقیت ثبت شد. شماره سفارش" . $model->refID;
                    \yii::$app->sms->Send($model->mobile, $text);
                }
                return $this->redirect('/thankyou/');
            } elseif ($zarinpal->getStatus() == '101') {
                return $this->redirect('/failed/');
            }
        } else {
            return $this->redirect('/failed/');
        }

    }

    public function actionCallback($id)
    {
        if (\yii::$app->payment->melli_callback(\yii::$app->request->post('OrderId'), \yii::$app->request->post('token'), \yii::$app->request->post('ResCode'))) {
            $callbackData = \yii::$app->payment->melli_callback(\yii::$app->request->post('OrderId'), \yii::$app->request->post('token'), \yii::$app->request->post('ResCode'));
            if ($callbackData['status'] == 1) {
                $model = \app\models\Bascket::find()->where(['id' => $id])->one();
                $model->refID = $callbackData['data']['referCode'];
                $model->status = 1;
                $model->bank = 'melli';
                if ($model->save()) {
                    $cartitem = \app\models\Cart::find()->Where(['id' => $model->cartID])->one();
                    $cartitem->status = 1;
                    if ($cartitem->save()) {
                        unset(\Yii::$app->session['cart_id']);
                        unset(\Yii::$app->session['guest_id']);
                        foreach (\app\models\Cartoption::find()->Where(['cartID' => $cartitem->id])->all() as $cartoption) {
                            foreach (\app\models\Product::find()->Where(['id' => $cartoption->productID])->all() as $product) {
                                if (\app\models\Featurevalue::find()->Where(['productID' => $product->id])->all()) {
                                    foreach (\app\models\Fvoption::find()->Where(['cartoptionID' => $cartoption->id])->all() as $fvoption) {
                                        $featurevalue = \app\models\Featurevalue::find()->Where(['id' => $fvoption->featurevID])->one();
                                        $featurevalue->count -= $cartoption->count;
                                        $featurevalue->save();
                                    }
                                } else {
                                    $productitem = \app\models\Product::find()->Where(['id' => $product->id])->one();
                                    $productitem->count -= $cartoption->count;
                                    $productitem->save();
                                }
                            }
                        }
                    }
                    $text = "بی سی سی : سفارش شما با موفقیت ثبت شد. شماره سفارش" . $model->refID;
                    \yii::$app->sms->Send($model->mobile, $text);
                }
                return $this->redirect('/thankyou/');
            } else {
                return $this->redirect('/failed/');
            }
        }
    }





    // public function beforeActions($action)
    // {            
    //     if ($action->id == 'verify') {
    //         $this->enableCsrfValidation = false;
    //     }
    //     if ($action->id == 'callbackmelat') {
    //         $this->enableCsrfValidation = false;
    //     }
    //     if ($action->id == 'callback') {
    //         $this->enableCsrfValidation = false;
    //     }

    //     return parent::beforeActions($action);
    // }

}
