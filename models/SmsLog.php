<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sms_log".
 *
 * @property int $id
 * @property string $phone_number
 * @property string $message
 * @property string $created_at
 */
class SmsLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sms_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
//        return [
//            [['message'], 'string'],
//            [['created_at'], 'string'],
//            [['phone_number'], 'string', 'max' => 255],
//        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone_number' => 'Phone Number',
            'message' => 'Message',
            'created_at' => 'Created At',
        ];
    }
}
