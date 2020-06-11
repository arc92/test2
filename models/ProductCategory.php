<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_relation".
 *

 * @property int $product_id
 * @property int category_product_id
 *
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catproduct_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'category_product_id'], 'required'],
            [['product_id', 'category_product_id'], 'integer'],
            [['category_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catproduct::className(), 'targetAttribute' => ['category_product_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'category_product_id' => 'Cat ID',
        ];
    }
}
