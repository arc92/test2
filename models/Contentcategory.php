<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contentcategory".
 *
 * @property int $id
 * @property int $catID نام دسته بندی
 * @property string $title عنوان
 * @property string $content توضیحات
 *
 * @property Catproduct $cat
 */
class Contentcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contentcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catID', 'title', 'content'], 'required'],
            [['catID'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 1024],
            [['catID'], 'exist', 'skipOnError' => true, 'targetClass' => Catproduct::className(), 'targetAttribute' => ['catID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catID' => 'نام دسته بندی',
            'title' => 'عنوان',
            'content' => 'توضیحات',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Catproduct::className(), ['id' => 'catID']);
    }
}
