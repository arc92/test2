<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timesend".
 *
 * @property int $id
 * @property string $time1 از ساعت

 * @property int $countSend تعداد ارسال
 * @property string $submitDate تاریخ ثبت
 */
class Timesend extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timesend';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time1',   'countSend', 'submitDate'], 'required'],
            [['countSend'], 'integer'],
            [['time1',  'submitDate'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time1' => 'از ساعت',
            'countSend' => 'تعداد ارسال',
            'submitDate' => 'تاریخ ثبت',
        ];
    }
}
