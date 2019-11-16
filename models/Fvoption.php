<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fvoption".
 *
 * @property int $id
 * @property int $cartoptionID جزئیات سبد خرید
 * @property int $featurevID ویژگی
 * @property int $sizeID سایز
 * @property string $submitDate تاریخ ثبت
 *
 * @property Cartoption $cartoption
 * @property Featurevalue $featurev 
 */
class Fvoption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fvoption';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cartoptionID', 'submitDate'], 'required'],
            [['cartoptionID', 'featurevID', 'sizeID'], 'integer'],
            [['submitDate'], 'string', 'max' => 50],
            [['cartoptionID'], 'exist', 'skipOnError' => true, 'targetClass' => Cartoption::className(), 'targetAttribute' => ['cartoptionID' => 'id']],
            [['featurevID'], 'exist', 'skipOnError' => true, 'targetClass' => Featurevalue::className(), 'targetAttribute' => ['featurevID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cartoptionID' => 'جزئیات سبد خرید',
            'featurevID' => 'ویژگی',
            'sizeID' => 'سایز',
            'submitDate' => 'تاریخ ثبت',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartoption()
    {
        return $this->hasOne(Cartoption::className(), ['id' => 'cartoptionID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeaturev()
    {
        return $this->hasOne(Featurevalue::className(), ['id' => 'featurevID']);
    }

  
}
