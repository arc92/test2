<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tagblog".
 *
 * @property int $id
 * @property int $blogID
 * @property string $name برچسب
 */
class Tagblog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagblog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blogID', 'name'], 'required'],
            [['blogID'], 'integer'],
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
            'blogID' => 'Blog ID',
            'name' => 'برچسب',
        ];
    }
}
