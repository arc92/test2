<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Video extends Model
{
     /**
     * @var UploadedFile
     */
    public $videoFile;
    public function rules()
    {
        return [
            [['videoFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'mp4, wmp'],
        ];
    }
    public function upload(){
        if ($this->validate()) {
            $name=$this->videoFile->baseName . time().'.' . $this->videoFile->extension;
            $this->videoFile->saveAs('uploads/video/' . $name);
            return $name;
        } else {
            return false;
        }
    }
 

      /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
           
            'videoFile' => 'ویدئو',
        ];
    }

}


