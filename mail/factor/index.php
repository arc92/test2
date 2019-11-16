<?php 
   
   

?>
<table class="body">
		<tr>
			<td class="center" align="center" valign="top">
        <center>


          <table class="row header">
            <tr>
              <td class="center" align="center">
                <center>

                  <table class="container">
                    <tr>
                      <td class="wrapper last">

                        <table class="twelve columns">
                          <tr>

                            <td class="six sub-columns">
                              <img src="http://www.bccstyle.com/uploads/logo-light1546947341.png">
                            </td>
                            <td class="six sub-columns last" align="right" style="text-align:right; vertical-align:middle;">
                              <span class="template-label">bccstyle.com/</span>
                            </td>
                            <td class="expander"></td>

                          </tr>
                        </table>

                      </td>
                    </tr>
                  </table>

                </center>
              </td>
            </tr>
          </table>
          <br>

          <table class="container">
            <tr>
              <td>

                <!-- content start -->
                <table class="row">
                  <tr>
                    <td class="wrapper last">

                      <table class="twelve columns">
                        <tr>
                          <td>

                            <h1> سلام <?=$model->name?>  </h1>
                            <p class="lead">شماره سفارش:<?=$model->refID?></p>
                            <?php 
                        foreach(app\models\Cartoption::find()->Where(['cartID'=>$model->cartID])->all() as $cart){
                          foreach(\app\models\Product::find()->Where(['id'=>$cart->productID])->all() as $product){ 
                          ?>
                						<img width="200" height="150" src="http://www.bccstyle.com/<?=$product->productimgs->img ?>"">
                          <?php } } ?>
                          </td>
                          <td class="expander"></td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                </table>

                <table class="row callout">
                  <tr>
                    <td class="wrapper last">

                      <table class="twelve columns">
                        <tr>
                          <td class="panel">

                            <p>خرید شما با موفقیت انجام شد لطفا از طریق لینک روبرو خرید خود را بررسی کنید :  <a href="https://www.bccstyle.com/user/order/index">کلیک کنید</a></p>

                          </td>
                          <td class="expander"></td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                </table>

                <table class="row">
                  <tr>
                    <td class="wrapper last">

                      <table class="twelve columns">
                        <tr>
                          <td>

                            <h3>عنوان محصول</h3>
                            <h3>تعداد</h3> 
                            <p>مبلغ</p>

                          </td>
                          <td class="expander"></td>
                        </tr>
                        <?php 
                        foreach(app\models\Cartoption::find()->Where(['cartID'=>$model->cartID])->all() as $cart){
                          foreach(\app\models\Product::find()->Where(['id'=>$cart->productID])->all() as $product){ 
                          ?>
                        <tr>
                          <td>

                            <h3><?=$product->name?></h3>
                            <p><?=$cart->count?></p>
                            <p><?=$cart->amount?></p>

                          </td>
                          <td class="expander"></td>
                        </tr>
                        <?php } } ?>
                        
                      </table>

                    </td>
                  </tr>
                </table>
                <table class="row">
                  <tr>
                    <td class="wrapper last">

                      <table class="twelve columns">
                        <tr>
                          <td>

                            <h3>شماره سفارش</h3>
                            <h3>مبلغ کل</h3>  
                          </td>
                          <td class="expander"></td>
                        </tr>
                        <tr>
                          <td>

                            <h3><?=$model->refID?></h3>
                            <h3><?=$model->amount?></h3>  

                          </td>
                          <td class="expander"></td>
                        </tr>
                     
                        
                      </table>

                    </td>
                  </tr>
                </table>


                <table class="row">
                  <tr>
                    <td class="wrapper last">

                      <table class="three columns">
                        <tr>
                          <td>

                            <table class="button">
                              <tr>
                                <td>
                                  <a href="https://www.bccstyle.com/">بی سی سی</a>
                                </td>
                              </tr>
                            </table>

                          </td>
                          <td class="expander"></td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                </table>


                <table class="row footer">
                  <tr>
                    <td class="wrapper">

                      <table class="six columns">
                        <tr>
                          <td class="left-text-pad">

                            <h5>شبکه های اجتماعی :</h5>

                            <table class="tiny-button facebook">
                              <tr>
                                <td>
                                  <a href="https://www.facebook.com/bccstyle">Facebook</a>
                                </td>
                              </tr>
                            </table>

                            <br>

                            <table class="tiny-button twitter">
                              <tr>
                                <td>
                                  <a href="http://.com/">Twitter</a>
                                </td>
                              </tr>
                            </table>

                            <br>

                            <table class="tiny-button google-plus">
                              <tr>
                                <td>
                                  <a href="http://.com/">Google +</a>
                                </td>
                              </tr>
                            </table>

                          </td>
                          <td class="expander"></td>
                        </tr>
                      </table>

                    </td>
                    <td class="wrapper last">

                      <table class="six columns">
                        <tr>
                          <td class="last right-text-pad">
                            <h5>تماس با ما:</h5>
                            <p>تلفن : ۶۶۹۶۲۹۵۷ - داخلی ۲۰۱ </p>
                            <p>ایمیل: <a href="info@bccstyle.com">info@bccstyle.com</a></p>
                          </td>
                          <td class="expander"></td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                </table>


                <table class="row">
                  <tr>
                    <td class="wrapper last">

                      <table class="twelve columns">
                        <tr>
                          <td align="center">
                            <center>
                              <p style="text-align:center;"><a href="https://www.bccstyle.com/">فروشگاه بی سی سی</a> | <a href="https://www.bccstyle.com/baby-clothing/">محصولات</a> | <a href="https://www.bccstyle.com/login/">ورود به پنل کاربری</a></p>
                            </center>
                          </td>
                          <td class="expander"></td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                </table>

                <!-- container end below -->
              </td>
            </tr>
          </table>

        </center>
			</td>
		</tr>
	</table>