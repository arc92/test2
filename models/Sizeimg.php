<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sizeimg".
 *
 * @property int $id
 * @property string $text متن
 * @property string $img تصاویر
 */
class Sizeimg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sizeimg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['img'], 'required'],
            [['img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'متن',
            'img' => 'تصاویر',
        ];
    }
}
