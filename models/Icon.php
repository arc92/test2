<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "icon".
 *
 * @property int $id
 * @property string $picture تصویر
 * @property string $title عنوان
 * @property int $status وضعیت
 */
class Icon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'icon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['picture', 'title', 'link','status'], 'required'],
            [['status'], 'integer'],
            [['picture','link'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'picture' => 'تصویر',
            'title' => 'عنوان',
            'link' => 'link',
            'status' => 'وضعیت',
        ];
    }
}
