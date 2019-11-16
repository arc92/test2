<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string $sitename نام سایت
 * @property string $logo لوگو سایت
 * @property string $about متن فوتر
 * @property string $footerlogo لوگو فوتر
 * @property string $title عنوان صفحه اصلی
 * @property string $description توضیحات
 * @property string $title_contactus عنوان صفحه contactus
 * @property string $description_contactus توضیحات صفحه contactus
 * @property string $title_aboutus عنوان صفحه aboutus
 * @property string $description_aboutus توضیحات صفحه aboutus
 * @property string $title_faq عنوان صفحهfaq
 * @property string $description_faq توضیحات صفحه faq
 * @property string $title_transport عنوان صفحه transport
 * @property string $description_transport توضیحات صفحه transport
 * @property string $title_size عنوان صفحه size
 * @property string $description_size توضیحات صفحه  size
 * @property string $title_blog عنوان صفحه  blog
 * @property string $description_blog توضیحات صفحه blog
 * @property string $title_blogsingle عنوان صفحه blogsingle
 * @property string $description_blogsingle توضیحات صفحه blogsingle
 * @property string $title_branches عنوان صفحه branches
 * @property string $description_branches توضیحات صفحه branches
 * @property string $title_certificates عنوان صفحه certificates
 * @property string $description_certificates توضیحات صفحه certificates
 * @property string $title_privacy عنوان صفحه privacy
 * @property string $description_privacy توضیحات صفحه privacy
 * @property string $title_help عنوان صفحه  help
 * @property string $description_help توضیحات صفحه help
 * @property string $title_cart عنوان صفحه  cart
 * @property string $description_cart توضیحات صفحه cart
 * @property string $title_endstep عنوان صفحه endstep
 * @property string $description_endstep توضیحات صفحه endstep
 * @property string $title_collection عنوان صفحه collection
 * @property string $description_collection توضیحات صفحه  collection
 * @property string $title_collection_inside عنوان صفحه collection/inside
 * @property string $description_collection_inside توضیحات صفحهcollection/index
 * @property string $title_product عنوان صفحه product
 * @property string $description_product توضیحات صفحه product
 * @property string $title_product_index عنوان صفحه product/index
 * @property string $description_product_index توضیحات صفحه product/index
 * @property string $title_girlgrid عنوان صفحه girlgrid
 * @property string $description_girlgrid توضیحات صفحه girlgrid
 * @property string $title_boygrid عنوان صفحه boygrid
 * @property string $description_boygrid توضیحات صفحه boygrid
 * @property string $title_girlbaby عنوان صفحه girlbaby
 * @property string $description_girlbaby توضیحات صفحه girlbaby
 * @property string $title_boybaby عنوان صفحه boybaby
 * @property string $description_boybaby توضیحات صفحه boybaby
 * @property string $title_child عنوان صفحه child
 * @property string $description_child توضیحات صفحه child
 * @property string $title_baby عنوان صفحه baby
 * @property string $description_baby توضیحات صفحه baby
 * @property string $title_menulink عنوان صفحه menulink
 * @property string $description_menulink توضیحات صفحه menulink
 * @property string $title_product_index2 عنوان صفحه product-index2
 * @property string $description_product_index2 توضیحات صفحه product-index2
 * @property string $title_baby_clothing عنوان صفحه baby_clothing
 * @property string $description_baby_clothing توضیحات صفحهbaby_clothing
 * @property string $create_date تاریخ ثبت
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sitename', 'logo', 'about', 'footerlogo', 'title', 'description', 'create_date'], 'required'],
            [['about'], 'string'],
            [['sitename'], 'string', 'max' => 50],
            [['logo', 'footerlogo', 'description', 'description_contactus', 'description_aboutus', 'description_faq', 'description_transport', 'description_size', 'description_blog', 'description_blogsingle', 'description_branches', 'description_certificates', 'description_privacy', 'description_help', 'description_cart', 'description_endstep', 'description_collection', 'description_collection_inside', 'description_product', 'description_product_index', 'description_girlgrid', 'description_boygrid', 'description_girlbaby', 'description_boybaby', 'description_child', 'description_baby', 'description_menulink', 'description_product_index2','description_baby_clothing'], 'string', 'max' => 255],
            [['title', 'title_contactus', 'title_aboutus', 'title_faq', 'title_transport', 'title_size', 'title_blog', 'title_blogsingle', 'title_branches', 'title_certificates', 'title_privacy', 'title_help', 'title_cart', 'title_endstep', 'title_collection', 'title_collection_inside', 'title_product', 'title_product_index', 'title_girlgrid', 'title_boygrid', 'title_girlbaby', 'title_boybaby', 'title_child', 'title_baby', 'title_menulink', 'title_product_index2','title_baby_clothing'], 'string', 'max' => 80],
            [['create_date'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sitename' => 'نام سایت',
            'logo' => 'لوگو سایت',
            'about' => 'متن فوتر',
            'footerlogo' => 'لوگو فوتر',
            'title' => 'عنوان صفحه اصلی',
            'description' => 'توضیحات',
            'title_contactus' => 'عنوان صفحه contactus',
            'description_contactus' => 'توضیحات صفحه contactus',
            'title_aboutus' => 'عنوان صفحه aboutus',
            'description_aboutus' => 'توضیحات صفحه aboutus',
            'title_faq' => 'عنوان صفحهfaq',
            'description_faq' => 'توضیحات صفحه faq',
            'title_transport' => 'عنوان صفحه transport',
            'description_transport' => 'توضیحات صفحه transport',
            'title_size' => 'عنوان صفحه size',
            'description_size' => 'توضیحات صفحه  size',
            'title_blog' => 'عنوان صفحه  blog',
            'description_blog' => 'توضیحات صفحه blog',
            'title_blogsingle' => 'عنوان صفحه blogsingle',
            'description_blogsingle' => 'توضیحات صفحه blogsingle',
            'title_branches' => 'عنوان صفحه branches',
            'description_branches' => 'توضیحات صفحه branches',
            'title_certificates' => 'عنوان صفحه certificates',
            'description_certificates' => 'توضیحات صفحه certificates',
            'title_privacy' => 'عنوان صفحه privacy',
            'description_privacy' => 'توضیحات صفحه privacy',
            'title_help' => 'عنوان صفحه  help',
            'description_help' => 'توضیحات صفحه help',
            'title_cart' => 'عنوان صفحه  cart',
            'description_cart' => 'توضیحات صفحه cart',
            'title_endstep' => 'عنوان صفحه endstep',
            'description_endstep' => 'توضیحات صفحه endstep',
            'title_collection' => 'عنوان صفحه collection',
            'description_collection' => 'توضیحات صفحه  collection',
            'title_collection_inside' => 'عنوان صفحه collection/inside',
            'description_collection_inside' => 'توضیحات صفحهcollection/index',
            'title_product' => 'عنوان صفحه product',
            'description_product' => 'توضیحات صفحه product',
            'title_product_index' => 'عنوان صفحه product/index',
            'description_product_index' => 'توضیحات صفحه product/index',
            'title_girlgrid' => 'عنوان صفحه girlgrid',
            'description_girlgrid' => 'توضیحات صفحه girlgrid',
            'title_boygrid' => 'عنوان صفحه boygrid',
            'description_boygrid' => 'توضیحات صفحه boygrid',
            'title_girlbaby' => 'عنوان صفحه girlbaby',
            'description_girlbaby' => 'توضیحات صفحه girlbaby',
            'title_boybaby' => 'عنوان صفحه boybaby',
            'description_boybaby' => 'توضیحات صفحه boybaby',
            'title_child' => 'عنوان صفحه child',
            'description_child' => 'توضیحات صفحه child',
            'title_baby' => 'عنوان صفحه baby',
            'description_baby' => 'توضیحات صفحه baby',
            'title_menulink' => 'عنوان صفحه menulink',
            'description_menulink' => 'توضیحات صفحه menulink',
            'title_product_index2' => 'عنوان صفحه product-index2',
            'description_product_index2' => 'توضیحات صفحه product-index2',
            'title_baby_clothing' => 'عنوان صفحه baby_clothing',
            'description_baby_clothing' => 'توضیحات صفحه baby_clothing',
            'create_date' => 'تاریخ ثبت',
        ];
    }
}
