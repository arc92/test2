<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $userID کاربر
 * @property string $submitDate تاریخ ثبت
 * @property int $status
 *
 * @property Cartoption[] $cartoptions
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userID', 'status'], 'integer'],
            [['submitDate', 'status'], 'required'],
            [['submitDate'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userID' => 'کاربر',
            'submitDate' => 'تاریخ ثبت',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartoptions()
    {
        return $this->hasMany(Cartoption::className(), ['cartID' => 'id']);
    }
}
