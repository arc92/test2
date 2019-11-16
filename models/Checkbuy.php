<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checkbuy".
 *
 * @property int $id
 * @property int $bascketID
 * @property int $cartID
 * @property int $userID کاربر
 * @property int $productID محصول
 * @property string $name نام محصول
 * @property string $submitDate تاریخ ثبت
 * @property string $description توضیحات
 * @property int $status وضعیت
 */
class Checkbuy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checkbuy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bascketID', 'cartID', 'userID', 'productID', 'name', 'submitDate', 'description', 'status'], 'required'],
            [['bascketID', 'cartID', 'userID', 'productID', 'status'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['submitDate'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bascketID' => 'Bascket ID',
            'cartID' => 'Cart ID',
            'userID' => 'کاربر',
            'productID' => 'محصول',
            'name' => 'نام محصول',
            'submitDate' => 'تاریخ ثبت',
            'description' => 'توضیحات',
            'status' => 'وضعیت',
        ];
    }
}
