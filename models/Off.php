<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "off".
 *
 * @property int $id
 * @property int $percent درصد تخفیف
 * @property int $status وضعیت
 */
class Off extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'off';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['percent', 'status'], 'required'],
            [['percent', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'percent' => 'درصد تخفیف',
            'status' => 'وضعیت',
        ];
    }
}
