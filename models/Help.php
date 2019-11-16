<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "help".
 *
 * @property int $id
 * @property int $cathelpID
 * @property string $titr
 * @property string $text
 * @property string $submitDate
 *
 * @property Cathelp $cathelp
 */
class Help extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'help';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cathelpID', 'titr', 'text', 'submitDate'], 'required'],
            [['cathelpID'], 'integer'],
            [['text'], 'string'],
            [['titr'], 'string', 'max' => 1024],
            [['submitDate'], 'string', 'max' => 20],
            [['cathelpID'], 'exist', 'skipOnError' => true, 'targetClass' => Cathelp::className(), 'targetAttribute' => ['cathelpID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
           // 'id' => 'ID',
            'cathelpID' => 'دسته بندی',
            'titr' => 'تیتر',
            'text' => 'متن',
            'submitDate' => 'تاریخ ثبت',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCathelp()
    {
        return $this->hasOne(Cathelp::className(), ['id' => 'cathelpID']);
    }
}
