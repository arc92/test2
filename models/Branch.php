<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "branch".
 *
 * @property int $id
 * @property string $name نام شعبه
 * @property string $address آدرس شعبه
 * @property string $tell شماره تماس 
 * @property string $map آدرس نقشه
 * @property string $submitDate تاریخ ثبت
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'map', 'submitDate'], 'required'],
            [['address'], 'string'],
            [['tell','isTop'], 'integer'],
            [['name','tell'], 'string', 'max' => 50],
            [['map'], 'string', 'max' => 255],
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
            'name' => 'نام شعبه',
            'address' => 'آدرس شعبه',
            'tell' => 'شماره تماس', 
            'map' => 'آدرس نقشه',
            'submitDate' => 'تاریخ ثبت',
            'isTop'=>'نمایش شعبه برتر'
        ];
    }
}
