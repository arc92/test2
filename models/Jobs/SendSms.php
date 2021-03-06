<?php
namespace app\models\Jobs;

use app\models\SmsLog;
use Carbon\Carbon;
use GuzzleHttp\Client;
use yii\base\BaseObject;
use yii\queue\JobInterface;

class SendSms extends BaseObject implements JobInterface
{
    public $message;
    public $number;
public function __construct($config = [])
{
    parent::__construct($config);
    $smsLog = (new SmsLog);
    $smsLog->phone_number = (string)$this->number;
    $smsLog->message = (string)$this->message;
    $smsLog->created_at = Carbon::now(\Yii::$app->timezone);


    $response = (new Client)->request('POST', 'http://api.smsapp.ir/v2/sms/send/simple', [
        'headers' => [
            'apikey' => '9bQPFjT8P/UB3mhGOJGYO0/aASU/STCCZ1lk+ECNvq0'
        ],
        'json' => [
            'message' => $this->message,
            'sender' => '30005066962957',
            'Receptor' => $this->number,
        ]
    ]);


    $smsLog->state = (string)(json_decode($response->getBody()->getContents())->result);
    $smsLog->save();
}

    public function execute($queue)
    {

    }
}