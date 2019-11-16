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
 * @property string $tel
 * @property string $mobile
 * @property string $day
 * @property int $timeID
 * @property int $expressID
 * @property string $description
 * @property string $discount
 * @property string $memeber
 * @property string $authority
 * @property string $refID
 * @property int $count
 * @property int $amount
 * @property int $status
 * @property string $submitDate
 * @property int $condition وضعیت تایید
 * @property string $commentadmin توضیحات ادمین
 * @property string $sendDate تاریخ ثبت توضیحات ادمین
 *
 * @property Province $state
 * @property City $city
 * @property Cart $cart
 * @property Payment[] $payments
 */
class Bascket extends \yii\db\ActiveRecord
{
    public $nameproduct=[];
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
            [['cartID', 'authority', 'refID', 'count', 'amount','tel','address','postalCode','mobile', 'status','stateID','cityID', 'submitDate','bank'], 'required'], 
            [['cartID', 'recived', 'stateID', 'cityID', 'tel', 'mobile', 'timeID','expressID', 'count', 'amount', 'postalCode', 'status', 'condition'], 'integer'],
            [['address', 'description', 'commentadmin','product'], 'string'],
            [['nameproduct'], 'safe'],
            [['name', 'family', 'authority'], 'string', 'max' => 100],
            [['day', 'refID', 'sendDate'], 'string', 'max' => 20],
            [['discount', 'memeber','bank', 'submitDate'], 'string', 'max' => 255],
            [['stateID'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['stateID' => 'id']],
            [['cityID'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['cityID' => 'id']],
            [['cartID'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::className(), 'targetAttribute' => ['cartID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cartID' => 'محصول',
            'recived' => 'دریافت کننده محصول خودم هستم',
            'name' => 'نام خریدار',
            'family' => 'نام خانوادگی خریدار',
            'stateID' => 'استان',
            'cityID' => 'شهر',
            'address' => 'آدرس',
            'tel' => 'تلفن',
            'mobile' => 'موبایل',
            'day' => 'تاریخ ارسال محصول',
            'timeID' => 'ساعت ارسال محصول',
            'expressID' => 'نحوه ارسال محصول',
            'description' => 'توضیحات',
            'discount' => 'تخفیف',
            'memeber' => 'کد باشگاه مشتریان',
            'authority' => 'Authority',
            'refID' => 'شماره سفارش',
            'count' => 'تعداد',
            'amount' => 'قیمت پرداخت شده ',
            'status' => 'وضعیت پرداخت',
            'status' => ' بانک',
            'postalCode'=> 'کد پستی',
            'submitDate' => 'تاریخ ثبت',
            'condition' => 'وضعیت تایید', 
            'commentadmin' => 'توضیحات ادمین',
            'sendDate' => 'تاریخ ثبت توضیحات ادمین',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(Province::className(), ['id' => 'stateID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'cityID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::className(), ['id' => 'cartID']);
    }
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getTime()
    {
        return $this->hasOne(Timesend::className(), ['id' => 'timeID']);
    }
    public function getExpress()
    {
        return $this->hasOne(Expresssend::className(), ['id' => 'expressID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['bascketID' => 'id']);
    }
}
