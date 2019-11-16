<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string $name موضوع
 *
 * @property Addcomment[] $addcomments
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'موضوع',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddcomments()
    {
        return $this->hasMany(Addcomment::className(), ['subjectID' => 'id']);
    }
}
