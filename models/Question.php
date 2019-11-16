<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property string $name نام کاربر
 * @property string $email ایمیل کاربر
 * @property string $mobile موبایل کاربر
 * @property string $question متن سوال
 * @property int $status وضعیت تایید
 * @property string $submitDate تاریخ ثبت
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */

    public $reCaptcha;

    public function rules()
    {
        return [
            [['name', 'email', 'mobile', 'question', 'status', 'submitDate','reCaptcha','file'], 'required'],
         //   ['verifyCode', 'captcha'], 
            ['email','email'],
            [['mobile', 'status'], 'integer'],
            [['question'], 'string'],
            [['name', 'email'], 'string', 'max' => 50],
            [['submitDate'], 'string', 'max' => 20],
            [['file'], 'string', 'max' => 255],
            ['reCaptcha', \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LdxxaEUAAAAACoJibZN33IbuF0af6gRhnMI-m7Z']

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'نام کاربر',
            'email' => 'ایمیل کاربر',
            'mobile' => 'موبایل کاربر',
            'question' => 'متن سوال',
            'status' => 'وضعیت تایید',
            'submitDate' => 'تاریخ ثبت',
            'file' => '',
            'reCaptcha' => '',
        ];
    }
 
}
