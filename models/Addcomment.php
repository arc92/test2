<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addcomment".
 *
 * @property int $id
 * @property int $userID
 * @property int $subjectID موضوع
 * @property string $description متن 
 * @property int $status وضعیت تایید
 * @property string $submitDate تاریخ ثبت
 *
 * @property Users $user
 * @property Subject $subject
 */
class Addcomment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addcomment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userID', 'subjectID', 'description', 'status', 'submitDate'], 'required'],
            [['userID', 'subjectID', 'status'], 'integer'],
            [['description'], 'string'],
            [['submitDate'], 'string', 'max' => 20],
            [['userID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userID' => 'id']],
            [['subjectID'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subjectID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userID' => 'User ID',
            'subjectID' => 'موضوع',
            'description' => 'متن ',
            'status' => 'وضعیت تایید',
            'submitDate' => 'تاریخ ثبت',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'userID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subjectID']);
    }
}
