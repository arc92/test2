<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $title عنوان
 * @property string $img تصویرر اسلایدر
 * @property int $status وضعیت انتشار
 * @property string $hour ساعت
 * @property string $create_date تاریخ ثبت
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'img', 'status', 'hour', 'create_date'], 'required'],
            [['status'], 'integer'],
            [['title', 'img'], 'string', 'max' => 200],
            [['hour'], 'string', 'max' => 6],
            [['create_date'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'لینک محصول',
            'img' => 'تصویرر اسلایدر',
            'status' => 'وضعیت انتشار',
            'hour' => 'ساعت',
            'create_date' => 'تاریخ ثبت',
        ];
    }
}
