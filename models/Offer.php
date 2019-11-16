<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offer".
 *
 * @property int $id
 * @property int $planID طرح مورد نظر
 * @property string $start_date تاریخ شروع
 * @property string $end_date تاریخ پایان
 * @property double $percent درصد تخفیف
 *
 * @property Plan $plan
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['planID', 'start_date', 'end_date', 'percent'], 'required'],
            [['planID'], 'integer'],
            [['percent'], 'number'],
            [['start_date', 'end_date'], 'string', 'max' => 255],
            [['planID'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['planID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'planID' => 'طرح مورد نظر',
            'start_date' => 'تاریخ شروع',
            'end_date' => 'تاریخ پایان',
            'percent' => 'درصد تخفیف',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['id' => 'planID']);
    }
}
