<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name عنوان دسته بندی
 *
 * @property Product[] $products
 * @property Subcat[] $subcats
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
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
            'name' => 'عنوان دسته بندی',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['catID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcats()
    {
        return $this->hasMany(Subcat::className(), ['catID' => 'id']);
    }
}
