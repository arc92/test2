<?php

namespace app\models;



use yii\base\model;

use yii\web\UploadedFile;



class Multiuploads extends Model{

    /**

     * @var UploadedFile

     */

    public $imageFiles;



    public function rules()

    {

        return [

            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,jpeg', 'maxFiles' =>7],

        ];

    }

   

  public function multiupload()

  {

    if ($this->validate()) { 

        $name=[];

        $i=0;

        foreach ($this->imageFiles as $file) {

            $name[$i]='uploads/' . $file->baseName . time() . '.' . $file->extension;

            $file->saveAs($name[$i]);

            $i++;

        }

        return $name;

    } else {

        return [];

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

