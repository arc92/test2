<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "setbabycat".
 *
 * @property int $id
 * @property string $img تصویر
 * @property int $name وضعیت
 * @property int $status
 */
class Setbabycat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setbabycat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img', 'name', 'status'], 'required'],
            [['status'], 'integer'],
            [['img','name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'تصویر',
            'name' => 'نام',
            'status' => 'وضعیت',
        ];
    }
}
