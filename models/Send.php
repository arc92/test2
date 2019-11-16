<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "send".
 *
 * @property int $id
 * @property string $date تاریخ ارسال
 * @property string $time1 ساعت ارسال
 * @property string $time2 ساعت ارسال بعدازظهر
 * @property int $count1 تعداد ارسال صبح
 * @property int $count2 تعداد ارسال بعد از ظهر
 * @property int $status وضعیت
 */
class Send extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'send';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'time1', 'time2', 'count1', 'count2', 'status'], 'required'],
            [['count1', 'count2', 'status'], 'integer'],
            [['date', 'time1', 'time2'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
           // 'id' => 'ID',
            'date' => 'تاریخ ارسال',
            'time1' => 'ساعت ارسال',
            'time2' => 'ساعت ارسال بعدازظهر',
            'count1' => 'تعداد ارسال صبح',
            'count2' => 'تعداد ارسال بعد از ظهر',
            'status' => 'وضعیت',
        ];
    }
}
