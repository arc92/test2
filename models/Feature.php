<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feature".
 *
 * @property int $id
 * @property string $value ویژگی
 *
 * @property Featurevalue[] $featurevalues
 */
class Feature extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feature';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'ویژگی',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeaturevalues()
    {
        return $this->hasMany(Featurevalue::className(), ['featureID' => 'id']);
    }
}
