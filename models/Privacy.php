<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "privacy".
 *
 * @property int $id
 * @property string $text حریم خصوصی
 */
class Privacy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'privacy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'حریم خصوصی',
        ];
    }
}
