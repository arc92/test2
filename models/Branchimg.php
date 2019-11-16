<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "branchimg".
 *
 * @property int $id
 * @property string $img
 * @property int $status
 */
class Branchimg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branchimg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img', 'status'], 'required'],
            [['status'], 'integer'],
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
            'img' => 'Img',
            'status' => 'Status',
        ];
    }
}
