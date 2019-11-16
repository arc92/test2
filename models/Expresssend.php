<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expresssend".
 *
 * @property int $id
 * @property string $city
 * @property string $send نحوه ارسال
 * @property int $price قیمت ارسال
 */
class Expresssend extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expresssend';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'send', 'price'], 'required'],
            [['price'], 'integer'],
            [['city', 'send'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'شهر',
            'send' => 'نحوه ارسال',
            'price' => 'قیمت ارسال',
        ];
    }
}
