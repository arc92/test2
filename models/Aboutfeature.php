<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aboutfeature".
 *
 * @property int $id
 * @property int $aboutID
 * @property string $titr تیتر
 * @property string $about متن
 * @property string $years سال
 *
 * @property Aboutus $about0
 */
class Aboutfeature extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aboutfeature';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aboutID', 'titr','about','years'], 'required'],
            [['aboutID'], 'integer'],
            [['about'], 'string'],
            [['titr'], 'string', 'max' => 1024],
            [['years'], 'string', 'max' => 255],
            [['aboutID'], 'exist', 'skipOnError' => true, 'targetClass' => Aboutus::className(), 'targetAttribute' => ['aboutID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aboutID' => 'About ID',
            'titr' => 'تیتر',
            'about' => 'متن',
            'years' => 'سال',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbout0()
    {
        return $this->hasOne(Aboutus::className(), ['id' => 'aboutID']);
    }
}
