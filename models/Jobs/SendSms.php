<?php
namespace app\models\Jobs;

use GuzzleHttp\Client;
use yii\base\BaseObject;
use yii\queue\JobInterface;

class SendSms extends BaseObject implements JobInterface
{
    public $message;
    public $number;

    public function execute($queue)
    {
        (new Client)->request('POST', 'http://api.smsapp.ir/v2/sms/send/simple', [
            'headers' => [
                'apikey' => '9bQPFjT8P/UB3mhGOJGYO0/aASU/STCCZ1lk+ECNvq0'
            ],
            'json' => [
                'message' => $this->message,
                'sender' => '30005066962957',
                'Receptor' => $this->number,
            ]
        ]);
    }
}