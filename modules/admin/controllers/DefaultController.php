<?php

namespace app\modules\admin\controllers;

use app\components\Sms;
use app\models\SmsLog;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
//        var_dump(Carbon::now(\Yii::$app->timeZone)->format('Y-m-d H:i:s'));die();
        $now = (Jalalian::fromDateTime(Carbon::now(\Yii::$app->timeZone)));
        $year = $now->getYear();
        $month = $now->getMonth();
        $from_date = \Morilog\Jalali\CalendarUtils::toGregorian($year,$month,1);

        $count = SmsLog::find()->where(['>','created_at',implode('-',$from_date)])->count();

        return $this->render('index',[
            "currentMountSmsStatistics" => $count,
            "month" => $now->format('%B')
        ]);
    }
}
