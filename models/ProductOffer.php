<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_offer".
 *
 * @property int $id
 * @property int $product_id محصول
 * @property double $percent درصد تخفیف
 * @property string $expire_date تاریخ 
 *
 * @property Product $product
 */
class ProductOffer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_offer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id','offer', 'percent', 'expire_date'], 'required'],
            [['product_id'], 'integer'],
            [['percent'], 'number'],
            [['offer','expire_date'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'محصول',
            'percent' => 'درصد تخفیف',
            'expire_date' => 'تاریخ ',
            'offer'=>'کد تخفیف',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
