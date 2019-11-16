<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "letme".
 *
 * @property int $id
 * @property int $productID محصول
 * @property int $mobile شماره تلفن همراه
 * @property string $submitDate تاریخ درخواست
 */
class Letme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'letme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productID', 'mobile', 'status', 'submitDate'], 'required'],
            [['productID','size','mobile', 'status'], 'integer'],
            [['submitDate'], 'string', 'max' => 20],
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
            'size' => 'سایز',
            'mobile' => 'شماره تلفن همراه',
            'status' => 'وضعیت',
            'submitDate' => 'تاریخ درخواست',
        ];
    }

    public function getProducts()
    {
        return $this->hasOne(Product::className(), ['id' => 'productID']);


    }
}
