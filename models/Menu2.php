<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu2".
 *
 * @property int $id
 * @property string $name عنوان منو
 * @property int $parent منو
 * @property int $has_submenu زیر منو
 * @property int $row ردیف
 */
class Menu2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'has_submenu', 'row'], 'required'],
            [['parent', 'has_submenu', 'row'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'عنوان منو',
            'parent' => 'منو',
            'has_submenu' => 'زیر منو',
            'link' => 'Link',
            'row' => 'ردیف',
        ];
    }
}
