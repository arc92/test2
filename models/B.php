<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bascket".
 *
 * @property int $id
 * @property int $cartID
 * @property int $recived
 * @property string $name
 * @property string $family
 * @property int $stateID
 * @property int $cityID
 * @property string $address
 * @property int $tel
 * @property int $mobile
 * @property string $day
 * @property int $timeID
 * @property string $description
 * @property string $discount
 * @property string $memeber
 * @property string $authority
 * @property string $refID
 * @property int $count
 * @property int $amount
 * @property int $status
 * @property string $submitDate
 *
 * @property Payment[] $payments
 */
class B extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bascket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cartID', 'authority', 'refID', 'count', 'amount', 'status', 'submitDate'], 'required'],
            [['cartID', 'recived', 'stateID', 'cityID', 'tel', 'mobile', 'timeID', 'count', 'amount', 'status'], 'integer'],
            [['address', 'description'], 'string'],
            [['name', 'family', 'authority'], 'string', 'max' => 100],
            [['day', 'refID', 'submitDate'], 'string', 'max' => 20],
            [['discount', 'memeber'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cartID' => 'Cart ID',
            'recived' => 'Recived',
            'name' => 'Name',
            'family' => 'Family',
            'stateID' => 'State ID',
            'cityID' => 'City ID',
            'address' => 'Address',
            'tel' => 'Tel',
            'mobile' => 'Mobile',
            'day' => 'Day',
            'timeID' => 'Time ID',
            'description' => 'Description',
            'discount' => 'Discount',
            'memeber' => 'Memeber',
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
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['bascketID' => 'id']);
    }
}
