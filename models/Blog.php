<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property int $catID عنوان دسته بندی
 * @property string $name نام مقاله
 * @property string $title عنوان مقاله
 * @property string $text متن مقاله
 * @property int $status وضعیت
 * @property string $create_date تاریخ انتشار
 *
 * @property Blogcat $cat
 * @property Blogimg[] $blogimgs
 * @property Blogvideo[] $blogvideos
 */
class Blog extends \yii\db\ActiveRecord
{
    
    public $tags=[];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catID', 'name', 'title', 'text','img','aboutimg', 'status', 'create_date'], 'required'],
            [['catID', 'status'], 'integer'],
            [['text'], 'string'],
            [['tags'], 'safe'],
            [['name', 'title'], 'string', 'max' => 1024],
            [['img','aboutimg'], 'string', 'max' => 255],
            [['create_date'], 'string', 'max' => 20],
            [['catID'], 'exist', 'skipOnError' => true, 'targetClass' => Blogcat::className(), 'targetAttribute' => ['catID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catID' => 'عنوان دسته بندی',
            'name' => 'نام مقاله',
            'title' => 'عنوان مقاله',
            'text' => 'متن مقاله',
            'img' => 'تصویر',
            'aboutimg' => 'متن تصویر',
            'status' => 'وضعیت',
            'create_date' => 'تاریخ انتشار',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Blogcat::className(), ['id' => 'catID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogimg()
    {
        return $this->hasOne(Blogimg::className(), ['blogID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogvideos()
    {
        return $this->hasMany(Blogvideo::className(), ['blogID' => 'id']);
    }
    public function getBlogcomment()
    {
        return $this->hasMany(Blogcomment::className(), ['blogID' => 'id']);
    }
}
