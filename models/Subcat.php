<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subcat".
 *
 * @property int $id
 * @property string $name عنوان زیر دسته بندی
 *
 
 */
class Subcat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'عنوان زیر دسته بندی',
        ];
    }

  
}
