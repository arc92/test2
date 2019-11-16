<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "piccat".
 *
 * @property int $id
 * @property string $imgone تصویر نوزاد دختر
 * @property string $imgtow تصویر نوزاد پسر
 */
class Piccat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'piccat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imgone', 'imgtow'], 'required'],
            [['imgone', 'imgtow'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imgone' => 'تصویر نوزاد دختر',
            'imgtow' => 'تصویر نوزاد پسر',
        ];
    }
}
