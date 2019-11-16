<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detailsvalue".
 *
 * @property int $id
 * @property int $detailsID مشخصات محصول
 * @property int $productID نام محصول
 * @property string $title عنوان 
 * @property string $value مقدار ویژگی
 *
 * @property Details $details
 * @property Product $product
 */
class Detailsvalue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detailsvalue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detailsID', 'productID', 'title', 'value'], 'required'],
            [['detailsID', 'productID'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 50],
            [['detailsID'], 'exist', 'skipOnError' => true, 'targetClass' => Details::className(), 'targetAttribute' => ['detailsID' => 'id']],
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
            'detailsID' => 'مشخصات محصول',
            'productID' => 'نام محصول',
            'title' => 'عنوان ',
            'value' => 'مقدار مشخصات',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetails()
    {
        return $this->hasOne(Details::className(), ['id' => 'detailsID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productID']);
    }
}
