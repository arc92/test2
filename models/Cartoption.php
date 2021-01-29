<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cartoption".
 *
 * @property int $id
 * @property int $cartID سبد خرید
 * @property int $productID محصول
 * @property int $count تعداد
 * @property int $amount قیمت محصول
 * @property string $submitDate تاریخ ثبت
 *
 * @property Cart $cart
 * @property Product $product
 */
class Cartoption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cartoption';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cartID', 'productID', 'count', 'submitDate'], 'required'],
            [['cartID', 'productID', 'count', 'amount','off'], 'integer'],
            [['submitDate'], 'string', 'max' => 50],
            [['cartID'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::className(), 'targetAttribute' => ['cartID' => 'id']],
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
            'cartID' => 'سبد خرید',
            'productID' => 'محصول',
            'count' => 'تعداد',
            'amount' => 'قیمت محصول',
            'submitDate' => 'تاریخ ثبت',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::className(), ['id' => 'cartID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasMany(Product::className(), ['id' => 'productID']);
    }

    public function getFvoption()
    {
        return $this->hasMany(Fvoption::className(), ['cartoptionID' => 'id']);
    }
}
