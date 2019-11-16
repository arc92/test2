<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "star".
 *
 * @property int $id
 * @property int $productID محصول
 * @property int $userID کاربر
 * @property string $submitDate تاریخ ثبت
 */
class Star extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'star';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productID', 'rate','submitDate'], 'required'],
            [['productID', 'userID','rate'], 'integer'],
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
            'productID' => 'محصول',
            'userID' => 'کاربر',
            'submitDate' => 'تاریخ ثبت',
            'rate' => '',
        ];
    }
}
