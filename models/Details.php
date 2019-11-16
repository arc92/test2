<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "details".
 *
 * @property int $id
 * @property string $value مشخصات محصول
 *
 * @property Detailsvalue[] $detailsvalues
 */
class Details extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'details';
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
            'value' => 'مشخصات محصول',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailsvalues()
    {
        return $this->hasMany(Detailsvalue::className(), ['detailsID' => 'id']);
    }
}
