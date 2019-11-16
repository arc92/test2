<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $fullName
 * @property string $password
 * @property string $email
 * @property string $has_mobile
 * @property int $mobile
 * @property int $tell
 * @property string $day روز تولد
 * @property string $mounth ماه تولد
 * @property string $year سال تولد
 * @property string $img تصویر کاربر 
 * @property string $role
 * @property string $submitDate تاریخ ثبت
 *
 * @property Cart[] $carts
 * @property Interest[] $interests
 */
class Users extends \yii\db\ActiveRecord
{
    public $username;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullName', 'password', 'has_mobile', 'mobile', 'role', 'submitDate','active'], 'required'],
            ['email','email'],
            [['mobile','tell', 'active', 'submitDate'], 'integer'],
            [['fullName'], 'string', 'max' => 100],
            [['password', 'email','img'], 'string', 'max' => 255],
            [['has_mobile'], 'string', 'max' => 20],
            [['day', 'mounth','year'], 'string', 'max' => 20], 
            [['role'], 'string', 'max' => 10], 
            [['username'], 'safe'],
            [['mobile'], 'unique'],
            [['email'], 'unique'],
            [['mobile'],'match', 'pattern' =>'/^(\+98|0)?9\d{9}$/'], 
            [[ 'password'], 'string','min'=>6, 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullName' => 'نام و نام خانوادگی',
            'password' => 'رمز عبور',
            'email' => 'ایمیل',
            'has_mobile' => 'Has Mobile',
            'mobile' => 'َشماره تلفن همراه',
            'tell' => 'َشماره تلفن ثابت', 
            'day' => 'روز تولد',
            'mounth' => 'ماه تولد',
            'year' => 'سال تولد',
            'img' => ' تصویر کاربر',
            'role' => 'نوع کاربری',
            'submitDate' => 'کد تایید',
            'active' => 'وضعیت تایید',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['userID' => 'id']);
    }
    public function getAddress()
    {
        return $this->hasMany(Useraddress::className(), ['userID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interest::className(), ['userID' => 'id']);
    }
}
