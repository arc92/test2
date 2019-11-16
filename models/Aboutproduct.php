<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aboutproduct".
 *
 * @property int $id
 * @property int $productID
 * @property string $details مشخصات محصول
 *
 * @property Product $product
 */
class Aboutproduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aboutproduct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productID', 'details'], 'required'],
            [['productID'], 'integer'],
            [['details'], 'string', 'max' => 512],
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
            'details' => 'مشخصات محصول',
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
