<?php 
namespace app\components;
use yii;
use yii\base\Component;
use app\models\Setting; 

class Sms extends Component{

    public $username;
    public $password;
    public $lineNumber;

    public function init(){
        parent::init();
    }
 
    public function Send($receiverNumber,$text){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.smsapp.ir/v2/sms/send/simple",
        CURLOPT_RETURNTRANSFER =>1,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "message=".$text."&sender=30005066962957&Receptor=".$receiverNumber,
        CURLOPT_HTTPHEADER => array(
        "apikey: 9bQPFjT8P/UB3mhGOJGYO0/aASU/STCCZ1lk+ECNvq0",
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

    }
}













    //     // turn off the WSDL cache
    //     ini_set("soap.wsdl_cache_enabled", "0");
    //     try {
    //     $client = new \SoapClient('http://parsasms.com/webservice/v2.asmx?WSDL', array('encoding'=>'UTF-8'));
    //     $this->SetSetting();
    //     $parameters['username'] = $this->username;
    //     $parameters['password'] = $this->password;
    //     $parameters['from'] = $this->lineNumber;
    //     $parameters['to'] = array($receiverNumber);
    //     $parameters['text'] =$text;
    //     $parameters['isflash'] = true;
    //     $parameters['udh'] = "";
    //     $parameters['recId'] = array(0);
    //     $parameters['status'] = 0x0;
    //     return $client->SendSMS($parameters)->SendSmsResult;
    //     } catch (SoapFault $ex) {
    //     echo $ex->faultstring;
    //     }
    // }
    // public function GetCredit(){
    //       // turn off the WSDL cache
    //       ini_set("soap.wsdl_cache_enabled", "0");
    //       try {
    //              $client = new \SoapClient('http://parsasms.com/webservice/v2.asmx?WSDL', array('encoding'=>'UTF-8'));
    //              $this->SetSetting();
    //              return $client->GetCredit(array("username"=>$this->username,"password"=>$this->password))->GetCreditResult;
    //         } catch (SoapFault $ex) {
    //             echo $ex->faultstring;
    //         }  
    // }
