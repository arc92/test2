<?php
include_once('lib/nusoap.php');
var_dump($result);

$terminalId = "1987903"; // Terminal ID
$userName = "bcc73"; // Username
$userPassword = "99863608"; // Password
$orderId = time(); // Order ID
$amount = "1000"; // Price / Rial
$localDate = date('Ymd'); // Date
$localTime = date('Gis'); // Time
$additionalData = '';
$callBackUrl = "http://185.204.101.16//mellat/callback.php"; // Callback URL
$payerId = '0';
 
//-- تبدیل اطلاعات به آرایه برای ارسال به بانک
$parameters = array(
 'terminalId' => $terminalId,
 'userName' => $userName,
 'userPassword' => $userPassword,
 'orderId' => $orderId,
 'amount' => $amount,
 'localDate' => $localDate,
 'localTime' => $localTime,
 'additionalData' => $additionalData,
 'callBackUrl' => $callBackUrl,
 'payerId' => $payerId);
 
$client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
$namespace='http://interfaces.core.sw.bps.com/';
$result = $client->call('bpPayRequest', $parameters, $namespace);
var_dump($result);
//-- بررسی وجود خطا
if ($client->fault)
{
 //-- نمایش خطا
 echo "There was a problem connecting to Bank";
 exit;
} 
else
{
 $err = $client->getError();
 if ($err)
 {
 //-- نمایش خطا
 echo "Error : ". $err;
 exit;
 } 
 else
 {
 $res = explode (',',$result);
 $ResCode = $res[0];
 if ($ResCode == "0")
 {
 //-- انتقال به درگاه پرداخت
 echo '<form name="myform" action="https://bpm.shaparak.ir/pgwchannel/startpay.mellat" method="POST">
 <input type="hidden" id="RefId" name="RefId" value="'. $res[1] .'">
 </form>
 <script type="text/javascript">window.onload = formSubmit; function formSubmit() { document.forms[0].submit(); }</script>';
 exit;
 }
 else
 {
 //-- نمایش خطا
 echo "Error : ". $result;
 exit;
 }
 }
}
?>