<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "useraddress".
 *
 * @property int $id
 * @property int $userID کاربر
 * @property string $address آدرس
 * @property int $postalCode کد پستی
 * @property int $status فعال
 * @property string $create_date تاریخ ثبت
 *
 * @property Users $user
 */
class Useraddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'useraddress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userID', 'address', 'postalCode', 'status', 'create_date'], 'required'],
            [['userID', 'postalCode', 'status'], 'integer'],
            [['address'], 'string'],
            [['create_date'], 'string', 'max' => 20],
            [['userID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userID' => 'کاربر',
            'address' => 'آدرس',
            'postalCode' => 'کد پستی',
            'status' => 'فعال',
            'create_date' => 'تاریخ ثبت',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'userID']);
    }
}
