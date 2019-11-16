<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "submenu2".
 *
 * @property int $id
 * @property int $parentID
 * @property string $name عنوان زیر منو
 * @property string $img تصویر
 * @property string $create_date
 *
 * @property Menu $parent
 */
class Submenu2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'submenu2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parentID', 'name', 'img', 'create_date'], 'required'],
            [['parentID'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['img'], 'string', 'max' => 255],
            [['create_date'], 'string', 'max' => 20],
            [['parentID'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['parentID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentID' => 'عنوان منو',
            'name' => 'عنوان زیر منو',
            'img' => 'تصویر',
            'create_date' => 'تاریخ ثبت',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Menu::className(), ['id' => 'parentID']);
    }
}
