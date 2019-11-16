<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productimg".
 *
 * @property int $id
 * @property int $productID
 * @property string $img تصویر
 * @property string $submitDate تاریخ ثبت
 *
 * @property Product $product
 */
class Productimg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productimg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productID', 'img', 'submitDate'], 'required'],
            [['productID'], 'integer'],
            [['img'], 'string', 'max' => 255],
            [['submitDate'], 'string', 'max' => 10],
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
            'productID' => 'Product ID',
            'img' => 'تصویر',
            'submitDate' => 'تاریخ ثبت',
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
