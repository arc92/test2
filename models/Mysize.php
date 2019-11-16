<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mysize".
 *
 * @property int $id
 * @property string $age سن
 * @property string $height قد
 * @property string $weight وزن
 * @property string $waist دور کمر
 * @property string $hip دور باسن
 * @property string $round دور شکم
 * @property string $arm دور بازو
 * @property string $wrist دور مچ
 */
class Mysize extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mysize';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age', 'height', 'weight', 'waist', 'hip', 'round', 'arm', 'wrist'], 'required'],
            [['age', 'height', 'weight', 'waist', 'hip', 'round', 'arm', 'wrist'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'age' => 'سن',
            'height' => 'قد',
            'weight' => 'وزن',
            'waist' => 'دور کمر',
            'hip' => 'دور باسن',
            'round' => 'دور شکم',
            'arm' => 'دور بازو',
            'wrist' => 'دور مچ',
        ];
    }
}
