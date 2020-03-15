<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property int $id
 * @property int $subcatID دسته بندی
 * @property string $name نام طرح
 * @property string $img تصویر طرح
 * @property string $create_date تاریخ ثبت
 * 
 * @property Product[] $products
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'create_date','status'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['img'], 'string', 'max' => 200],
            [['title','description'], 'string', 'max' => 255],
            [['status'], 'integer'],
            [['name'], 'unique'],
            [['create_date'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'نام طرح',
            'img' => 'تصویر طرح',
            'create_date' => 'تاریخ ثبت',
            'title' => 'عنوان صفحه',
            'description' => 'توضیحات meta',
        ];
    }

 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['planID' => 'id']);
    }

    public function getOffers()
    {
        return $this->hasMany(Offer::className(), ['planID' => 'id']);
    }
}
