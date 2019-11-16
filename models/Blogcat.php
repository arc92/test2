<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blogcat".
 *
 * @property int $id
 * @property string $name عنوان دسته بندی
 *
 * @property Blog[] $blogs
 */
class Blogcat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogcat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'عنوان دسته بندی',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['catID' => 'id']);
    }
}
