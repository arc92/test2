<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contactus".
 *
 * @property int $id
 * @property string $sitename نام سایت
 * @property string $about متن 
 * @property string $address نشانی محل شرکت
 * @property string $tel شماره تماس
 * @property string $email پست الکترونیک
 * @property string $submitDate تاریخ ثبت
 */
class Contactus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contactus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sitename', 'about', 'address','company', 'tel', 'email','title','description', 'submitDate'], 'required'],
            [['about', 'address','company'], 'string'],
            [['sitename','description'], 'string', 'max' => 255],
            [['tel', 'submitDate'], 'string', 'max' => 20],
            [['title'], 'string', 'max' => 80],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sitename' => 'نام سایت',
            'about' => 'متن ',
            'address' => 'نشانی محل شرکت',
            'address' => 'کارخانه',
            'tel' => 'شماره تماس',
            'email' => 'پست الکترونیک',
            'title' => 'عنوان صفحه',
            'description' => 'توضیحات',
            'submitDate' => 'تاریخ ثبت',
        ];
    }
}
