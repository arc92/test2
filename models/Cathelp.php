<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cathelp".
 *
 * @property int $id
 * @property string $name دسته بندی
 *
 * @property Help[] $helps
 */
class Cathelp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cathelp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'دسته بندی',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHelps()
    {
        return $this->hasMany(Help::className(), ['cathelpID' => 'id']);
    }
}
