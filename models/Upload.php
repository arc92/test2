<?php 

namespace app\models;



use yii\base\Model;

use yii\web\UploadedFile;



class Upload extends Model

{

     /**

     * @var UploadedFile

     */

    public $imgFile;

    public function rules()

    {

        return [

            [['imgFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf,docx,doc,png, jpg,jpeg','maxSize' => 10000000, 'tooBig' => 'حجم فایل انتخابی بیشتر از ۱۰ مگ است'],

        ];

    }

    public function upload(){ 
        if ($this->validate()) {

            $name=$this->imgFile->baseName . time().'.' . $this->imgFile->extension;

            $this->imgFile->saveAs('uploads/' . $name);

            return $name;

        } else{
            return false;
        }

    }

 



      /**

     * {@inheritdoc}

     */

    public function attributeLabels()

    {

        return [

           

            'imgFile' => 'تصویر',

        ];

    }



}









