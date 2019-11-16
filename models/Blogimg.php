<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blogimg".
 *
 * @property int $id
 * @property int $blogID
 * @property string $img تصویر
 * @property string $text متن زیر عکس
 *
 * @property Blog $blog
 */
class Blogimg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogimg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blogID', 'img'], 'required'],
            [['blogID'], 'integer'],
            [['img'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 1024],
            [['blogID'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::className(), 'targetAttribute' => ['blogID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blogID' => 'Blog ID',
            'img' => 'تصویر',
            'text' => 'متن زیر عکس',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(Blog::className(), ['id' => 'blogID']);
    }
}
