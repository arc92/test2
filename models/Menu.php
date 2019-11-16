<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $name عنوان منو 
 * @property int $parent
 * @property int $has_submenu
 * @property string $link لینک محصول 
 * @property string $create_date
 *
 * @property Submenu2[] $submenu2s
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'create_date'], 'required'],
            [['parent', 'has_submenu'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['link'], 'string', 'max' => 255],
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
            'name' => 'عنوان منو ',
            'parent' => 'Parent',
            'has_submenu' => 'Has Submenu',
            'link' => 'لینک محصول ',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubmenu2s()
    {
        return $this->hasMany(Submenu2::className(), ['parentID' => 'id']);
    }
}
