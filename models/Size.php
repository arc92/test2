<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "size".
 *
 * @property int $id
 * @property string $text راهنمای سایز
 * @property string $age سن
 * @property string $height ارتفاع - سانتی متر
 * @property string $width وزن - کیلوگرم
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'size';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'age', 'height', 'width'], 'required'],
            [['text'], 'string'],
            [['age', 'height', 'width'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'راهنمای سایز',
            'age' => 'سن',
            'height' => 'ارتفاع - سانتی متر',
            'width' => 'وزن - کیلوگرم',
        ];
    }
}
