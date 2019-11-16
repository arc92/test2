<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blogcomment".
 *
 * @property int $id
 * @property int $blogID مقاله
 * @property int $userID کاربر
 * @property string $fullname نام و نام خانوادگی
 * @property string $email ایمیل
 * @property string $text متن کامنت
 * @property int $status وضعیت تایید
 * @property string $create_date تاریخ ثبت
 */
class Blogcomment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogcomment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blogID', 'fullname', 'email', 'text', 'create_date'], 'required'],
            [['blogID', 'userID', 'status'], 'integer'],
            [['text'], 'string'],
            [['fullname'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 255],
            [['create_date'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blogID' => 'مقاله',
            'userID' => 'کاربر',
            'fullname' => 'نام و نام خانوادگی',
            'email' => 'ایمیل',
            'text' => 'متن کامنت',
            'status' => 'وضعیت تایید',
            'create_date' => 'تاریخ ثبت',
        ];
    }



    public function getBlog()
    {
        return $this->hasOne(Blog::className(), ['id' => 'blogID']);
    }
}
