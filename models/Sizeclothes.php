<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sizeclothes".
 *
 * @property int $id
 * @property int $userID
 * @property int $ageID
 * @property int $heightID
 * @property int $weightID
 * @property int $waistID
 * @property int $hipID
 * @property int $roundID
 * @property int $armID
 * @property int $wristID
 * @property string $submitDate
 */
class Sizeclothes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sizeclothes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userID', 'ageID', 'heightID', 'weightID', 'waistID', 'hipID', 'roundID', 'armID', 'wristID', 'submitDate'], 'required'],
            [['userID', 'ageID', 'heightID', 'weightID', 'waistID', 'hipID', 'roundID', 'armID', 'wristID'], 'integer'],
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
            'userID' => 'User ID',
            'ageID' => 'Age ID',
            'heightID' => 'Height ID',
            'weightID' => 'Weight ID',
            'waistID' => 'Waist ID',
            'hipID' => 'Hip ID',
            'roundID' => 'Round ID',
            'armID' => 'Arm ID',
            'wristID' => 'Wrist ID',
            'submitDate' => 'Submit Date',
        ];
    }
}
