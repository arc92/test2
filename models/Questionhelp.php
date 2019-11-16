<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questionhelp".
 *
 * @property int $id
 * @property int $cathelpID
 * @property string $question
 * @property string $answer
 * @property string $submitDate
 *
 * @property Cathelp $cathelp
 */
class Questionhelp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questionhelp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cathelpID', 'question', 'answer', 'submitDate'], 'required'],
            [['cathelpID'], 'integer'],
            [['question', 'answer'], 'string'],
            [['submitDate'], 'string', 'max' => 20],
            [['cathelpID'], 'exist', 'skipOnError' => true, 'targetClass' => Cathelp::className(), 'targetAttribute' => ['cathelpID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cathelpID' => 'دسته بندی',
            'question' => 'سوال',
            'answer' => 'جواب',
            'submitDate' => 'تاریخ ثبت',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCathelp()
    {
        return $this->hasOne(Cathelp::className(), ['id' => 'cathelpID']);
    }
}
