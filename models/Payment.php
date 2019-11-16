<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $bascketID
 * @property string $authority
 * @property string $refID
 * @property int $count
 * @property int $amount
 * @property int $status
 * @property string $submitDate
 *
 * @property Bascket $bascket
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bascketID', 'authority', 'refID', 'count', 'amount', 'status', 'submitDate'], 'required'],
            [['bascketID', 'count', 'amount', 'status'], 'integer'],
            [['authority'], 'string', 'max' => 100],
            [['refID', 'submitDate'], 'string', 'max' => 20],
            [['bascketID'], 'exist', 'skipOnError' => true, 'targetClass' => Bascket::className(), 'targetAttribute' => ['bascketID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bascketID' => 'Bascket ID',
            'authority' => 'Authority',
            'refID' => 'Ref ID',
            'count' => 'Count',
            'amount' => 'Amount',
            'status' => 'Status',
            'submitDate' => 'Submit Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBascket()
    {
        return $this->hasOne(Bascket::className(), ['id' => 'bascketID']);
    }
}
