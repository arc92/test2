<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shegeft".
 *
 * @property int $id
 * @property int $productID محصول 
 * @property int $off تخفیف
 * @property string $start_date تاریخ شروع
 * @property int $start_time ساعت شروع
 * @property int $end_time ساعت پایان
 * @property int $status وضعیت
 *
 * @property Product $product
 */
class Shegeft extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shegeft';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productID', 'off', 'start_date', 'start_time', 'end_time', 'status'], 'required'],
            [['productID', 'off', 'start_time', 'end_time', 'status'], 'integer'],
            [['start_date'], 'string', 'max' => 255],
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
            'productID' => 'محصول ',
            'off' => 'تخفیف',
            'start_date' => 'تاریخ شروع',
            'start_time' => 'ساعت شروع',
            'end_time' => 'ساعت پایان',
            'status' => 'وضعیت',
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
