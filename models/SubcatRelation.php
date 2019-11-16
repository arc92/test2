<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subcat_relation".
 *
 * @property int $id
 * @property int $productID
 * @property int $subcatID
 *
 * @property Subcat $subcat
 * @property Product $product
 */
class SubcatRelation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcat_relation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productID', 'subcatID'], 'required'],
            [['productID', 'subcatID'], 'integer'],
            [['subcatID'], 'exist', 'skipOnError' => true, 'targetClass' => Subcat::className(), 'targetAttribute' => ['subcatID' => 'id']],
            [['productID'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['productID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productID' => 'Product ID',
            'subcatID' => 'Subcat ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcat()
    {
        return $this->hasOne(Subcat::className(), ['id' => 'subcatID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productID'])->inverseOf('subcatRelations');
    }
}
