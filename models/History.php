<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property int $id
 * @property string $titr تیتر
 * @property string $about متن
 * @property int $years سال
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titr', 'about', 'years'], 'required'],
            [['about'], 'string'],
            [['years'], 'integer'],
            [['titr'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titr' => 'تیتر',
            'about' => 'متن',
            'years' => 'سال',
        ];
    }
}
