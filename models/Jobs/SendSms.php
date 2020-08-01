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
        if(!\Yii::$app->redis->get('currentMonthSms')){
            \Yii::$app->redis->set('currentMonthSms', 1);
            \Yii::$app->redis->expire('currentMonthSms',2592000);
        }else{
            \Yii::$app->redis->incr('currentMonthSms');
        }

        if(!\Yii::$app->redis->get('totalSms')){
            \Yii::$app->redis->set('totalSms', 1);
            \Yii::$app->redis->expire('currentMonthSms',2592000);
        }else{
            \Yii::$app->redis->incr('totalSms');
        }

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