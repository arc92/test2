<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "virtuals".
 *
 * @property int $id
 * @property string $img تصویر
 * @property string $link لینک
 */
class Virtuals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'virtuals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img', 'link'], 'required'],
            [['img', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'آیکن',
            'link' => 'لینک',
        ];
    }
}
