<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checkit".
 *
 * @property int $id
 * @property int $productID محصول
 * @property string $name نام و نام خانوادگی
 * @property string $userEmail ایمیل کاربر
 * @property string $usercheck متن بررسی
 * @property int $status وضعیت تایید
 * @property string $submitDate تاریخ ثبت
 *
 * @property Product $product
 */
class Checkit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checkit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productID', 'name', 'userEmail', 'usercheck', 'rate','status', 'submitDate'], 'required'],
            [['productID', 'status','rate'], 'integer'],
            [['usercheck'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['userEmail', 'submitDate'], 'string', 'max' => 50],
            [['productID'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['productID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productID' => 'محصول',
            'name' => 'نام و نام خانوادگی',
            'userEmail' => 'ایمیل کاربر',
            'usercheck' => 'متن بررسی',
            'status' => 'وضعیت تایید',
            'submitDate' => 'تاریخ ثبت',
            'rate' => 'امتیاز',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productID']);
    }
}
