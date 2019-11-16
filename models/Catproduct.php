<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catproduct".
 *
 * @property int $id
 * @property string $name نام دسته بندی
 * @property string $urltitle   عنوان در url
 * @property string $title عنوان
 * @property string $description توضیحات
 * @property int $staus وضعیت
 * @property string $img تصویر
 */
class Catproduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catproduct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','urltitle', 'title', 'description', 'staus', 'img','sort'], 'required'],
            [['staus','sort'], 'integer'],
            [['name', 'description', 'img','urltitle'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'نام دسته بندی',
            'title' => 'عنوان',
            'description' => 'توضیحات',
            'staus' => 'وضعیت',
            'img' => 'تصویر',
            'urltitle' => 'عنوان در url',
        ];
    }

       /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['catproductID' => 'id']);
    }
}
