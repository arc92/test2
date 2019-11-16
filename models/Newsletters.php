<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "newsletters".
 *
 * @property int $id
 * @property string $field
 * @property int $status وضعیت تایید
 * @property string $submitDate
 */
class Newsletters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'newsletters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['field', 'status', 'submitDate'], 'required'],
            [['status'], 'integer'],
            [['field'], 'string', 'max' => 255],
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
            'field' => 'شماره موبایل یا ایمیل',
            'status' => 'وضعیت تایید',
            'submitDate' => 'تاریخ درخواست',
        ];
    }
}
