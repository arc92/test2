<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aboutimg".
 *
 * @property int $id
 * @property string $img تصویر 
 * @property string $submitDate
 */
class Aboutimg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aboutimg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img', 'submitDate'], 'required'],
            [['img'], 'string', 'max' => 255],
            [['submitDate'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'تصویر ',
            'submitDate' => 'Submit Date',
        ];
    }
}
