<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "featurevalue".
 *
 * @property int $id
 * @property int $featureID
 * @property int $productID
 * @property string $value مقدار ویژگی
 * @property int $price قیمت
 * @property int $count تعداد
 *
 * @property Feature $feature
 * @property Product $product
 * @property Fvoption[] $fvoptions
 */
class Featurevalue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'featurevalue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['featureID', 'productID', 'price', 'count'], 'integer'],
            [['value'], 'string', 'max' => 50],
            [['featureID'], 'exist', 'skipOnError' => true, 'targetClass' => Feature::className(), 'targetAttribute' => ['featureID' => 'id']],
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
            'featureID' => 'ویژگی',
            'productID' => 'Product ID',
            'value' => 'مقدار ویژگی',
            'price' => 'قیمت',
            'count' => 'تعداد',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeature()
    {
        return $this->hasOne(Feature::className(), ['id' => 'featureID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFvoptions()
    {
        return $this->hasMany(Fvoption::className(), ['featurevID' => 'id']);
    }
   
}
