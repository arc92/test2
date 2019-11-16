<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aboutus".
 *
 * @property int $id
 * @property string $titr عنوان
 * @property string $text متن درباره ما
 * @property string $submitDate تاریخ ثبت
 *
 * @property Aboutfeatuer[] $aboutfeatuers
 * @property Aboutimg[] $aboutimgs
 */
class Aboutus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aboutus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titr', 'text', 'submitDate'], 'required'],
            [['text'], 'string'],
            [['titr'], 'string', 'max' => 1024],
            [['title'], 'string', 'max' => 80],
            [['description'], 'string', 'max' => 255],
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
            'titr' => 'عنوان',
            'text' => 'متن درباره ما',
            'title' => 'عنوان صفحه',
            'description' => 'توضیحات',
            'submitDate' => 'تاریخ ثبت',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAboutfeatuers()
    {
        return $this->hasMany(Aboutfeatuer::className(), ['aboutID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAboutimgs()
    {
        return $this->hasMany(Aboutimg::className(), ['aboutID' => 'id']);
    }
}
