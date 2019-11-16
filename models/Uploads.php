<?php

namespace app\models;



use yii\base\Model;

use yii\web\UploadedFile;



class Uploads extends Model

{

     /**

     * @var UploadedFile

     */

    public $imageFile;

    public function rules()

    {

        return [

            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg'],

        ];

    }

    public function upload(){ 
        if ($this->validate()) {

            $name=$this->imageFile->baseName . time().'.' . $this->imageFile->extension;

            $this->imageFile->saveAs('uploads/' . $name);

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

           

            'imageFile' => 'تصویر',

        ];

    }



}





