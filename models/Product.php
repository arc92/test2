<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name نام محصول
 * @property int $catproductID دسته بندی  اصلی
 * @property int $status نمایش
 * @property int $catID دسته بندی
 * @property int $subcatID زیر دسته بندی
* @property int $planID طرح
 * @property int $colorID رنگ
 * @property int $storePrice قیمت فروشگاه
 * @property int $price قیمت آنلاین
 * @property int $count تعداد محصول
 * @property string $description توضیحات
 * @property int $likes پسندیده شده
 * @property string $submitDate تاریخ ثبت
 *
 * @property Aboutproduct[] $aboutproducts
 * @property Cartoption[] $cartoptions
 * @property Checkit[] $checkits
 * @property Detailsvalue[] $detailsvalues
 * @property Featurevalue[] $featurevalues
 * @property Category $cat 
 * @property Subcat $subcat
 * @property Plan $plan 
  * @property Color $color
 * @property Productimg[] $productimgs
  * @property CategoryRelation[] $categoryRelations
  * @property SubcategoryRelation[] $subcategoryRelations
 */
class Product extends \yii\db\ActiveRecord
{
   public $cat_relation=[];
   public $subcat_relation=[];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','catproductID','status','planID','colorID', 'submitDate'], 'required'],
            [['catproductID','status','planID','colorID', 'storePrice', 'price', 'count', 'likes'], 'integer'],
            [['description'], 'string'],
            [['cat_relation','subcat_relation'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['titlemeta','descriptionmeta'], 'string', 'max' => 255],
            [['submitDate'], 'string', 'max' => 20],
            [['planID'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['planID' => 'id']],
            [['colorID'], 'exist', 'skipOnError' => true, 'targetClass' => Color::className(), 'targetAttribute' => ['colorID' => 'id']],
            [['catproductID'], 'exist', 'skipOnError' => true, 'targetClass' => Catproduct::className(), 'targetAttribute' => ['catproductID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'نام محصول',
            'catproductID' => 'دسته بندی اصلی',
            'status' => 'نمایش',
            'planID' => 'طرح',
            'colorID' => 'رنگ',
            'storePrice' => 'قیمت فروشگاه',
            'price' => 'قیمت ',
            'count' => 'تعداد محصول',
            'description' => 'توضیحات',
            'likes' => 'پسندیده شده',
            'submitDate' => 'تاریخ ثبت',
            'titlemeta' => 'عنوان صفحه',
            'descriptionmeta' => 'توضیحات صفحه',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAboutproducts()
    {
        return $this->hasMany(Aboutproduct::className(), ['productID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartoptions()
    {
        return $this->hasMany(Cartoption::className(), ['productID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckits()
    {
        return $this->hasMany(Checkit::className(), ['productID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailsvalues()
    {
        return $this->hasMany(Detailsvalue::className(), ['productID' => 'id']);
    }
   /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbout()
    {
        return $this->hasMany(Aboutproduct::className(), ['productID' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeaturevalues()
    {
        return $this->hasMany(Featurevalue::className(), ['productID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryRelations()
    {
        return $this->hasOne(CategoryRelation::className(), ['productID' => 'id'])->inverseOf('product');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcatRelations()
    {
        return $this->hasOne(SubcatRelation::className(), ['ProductID' => 'id'])->inverseOf('product');;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['id' => 'planID']);
    }

        /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Color::className(), ['id' => 'colorID']);
    }

        /**
     * @return \yii\db\ActiveQuery
     */

    public function getCatproduct()
    {
        return $this->hasOne(Catproduct::className(), ['id' => 'catproductID']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductimgs()
    {
        return $this->hasOne(Productimg::className(), ['productID' => 'id']);
    }


    public function getOffer()
    {
        return $this->hasOne(Offer::className(), ['planID' => 'planID']);
    }

    public function checkCount(){
        $count=0;
        // if(Featurevalue::find()->where(['productID'=>$this->id,'count'=>0])->count() && (Product::find()->where(['id'=>$this->id,'count'=>0])->count() || Product::find()->where(['id'=>$this->id,'count'=>null])->count())){
    
          //  if($s=\app\models\Featurevalue::find()->where(['productID'=>$this->id])->all()){  
             foreach(\app\models\Featurevalue::find()->where(['productID'=>$this->id])->all() as $g){  
                 $item[$g->count]=$g->count;
                // var_dump($item==[0]);exit;
                if($item==[0]){
                     $count=1;  
                }else{
                    $count=0; 
                }
            }
               
       // }
        // if(Featurevalue::find()->where(['productID'=>$this->id])->count()==0 && (Product::find()->where(['id'=>$this->id,'count'=>0])->count() || Product::find()->where(['id'=>$this->id,'count'=>null])->count())){
        if(Product::find()->where(['id'=>$this->id,'count'=>0])->count()){
            $count=1;
        }
        return $count;
    }

}
