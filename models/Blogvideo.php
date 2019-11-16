<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blogvideo".
 *
 * @property int $id
 * @property int $blogID
 * @property string $video ویدیو
 *
 * @property Blog $blog
 */
class Blogvideo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogvideo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blogID', 'video'], 'required'],
            [['blogID'], 'integer'],
            [['video'], 'string', 'max' => 255],
            [['blogID'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::className(), 'targetAttribute' => ['blogID' => 'id']],
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
            'video' => 'ویدیو',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(Blog::className(), ['id' => 'blogID']);
    }
}
