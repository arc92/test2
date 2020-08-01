<?php

namespace app\modules\admin\controllers;

use app\models\Jobs\SendSms;
use app\models\ProductCategory;
use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MultiUploads;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $multiupload = new MultiUploads();
        $multiupload->imageFiles = UploadedFile::getInstances($multiupload, 'imageFiles');
        $aboutproductmodel = new \app\models\Aboutproduct();
        $featurevaluemodel = new \app\models\Featurevalue();
        $detailsvaluemodel = new \app\models\Detailsvalue();

        if ($model->load(Yii::$app->request->post()) && $aboutproductmodel->load(Yii::$app->request->post()) && $featurevaluemodel->load(Yii::$app->request->post()) && $detailsvaluemodel->load(Yii::$app->request->post())) {

            // var_dump();exit;
            // foreach($model->catID as $_cat){    
            //     $productitem=new \app\models\Product();
            //     $productitem->name=$model->name; 
            //     $productitem->catID=$_cat;   
            //     $productitem->subcatID=$model->subcatID; 
            //     $productitem->planID=$model->planID; 
            //     $productitem->colorID=$model->colorID; 
            //     $productitem->price=$model->price; 
            //     $productitem->count=$model->count; 
            //     $productitem->description=$model->description; 
            //     $productitem->submitDate=Yii::$app->jdate->date('Y/m/d');  
            //     $productitem->save();  
            // } 
            $model->submitDate = Yii::$app->jdate->date('Y/m/d');


            if ($model->save()) {

                foreach ($model->cat_relation as $_cat) {
                    $cat = new \app\models\CategoryRelation();
                    $cat->catID = $_cat;
                    $cat->productID = $model->id;
                    $cat->save();
                }


                foreach ($model->subcat_relation as $_subcat) {
                    $subcat = new \app\models\SubcatRelation();
                    $subcat->subcatID = $_subcat;
                    $subcat->productID = $model->id;
                    $subcat->save();
                }
                ///about product field 
                foreach ($aboutproductmodel->details as $value) {
                    $aboutproductmodelitem = new \app\models\Aboutproduct();
                    $aboutproductmodelitem->productID = $model->id;
                    $aboutproductmodelitem->details = $value;
                    $aboutproductmodelitem->save();
                }
                // if(Yii::$app->request->post('Featurevalue[value]')!=null){

                $j = 0;

                foreach ($featurevaluemodel->value as $value) {
                    //  var_dump($featurevaluemodel->value);exit;
                    if ($value != null && $value != "") {
                        $featurevaluemodelitem = new \app\models\Featurevalue();
                        $featurevaluemodelitem->featureID = $featurevaluemodel->featureID[$j];
                        $featurevaluemodelitem->productID = $model->id;
                        $featurevaluemodelitem->value = $value;
                        if ($featurevaluemodel->price[$j] == null) {
                            $featurevaluemodelitem->price = $model->price;
                        } elseif ($featurevaluemodel->price[$j] != null) {
                            $featurevaluemodelitem->price = $featurevaluemodel->price[$j];
                        }
                        $featurevaluemodelitem->count = $featurevaluemodel->count[$j];
                        $featurevaluemodelitem->save();
                        $j++;
                    }
                }


                $i = 0;

                foreach ($detailsvaluemodel->value as $value) {
                    $detailsvalueitem = new \app\models\Detailsvalue();
                    $detailsvalueitem->detailsID = $detailsvaluemodel->detailsID[$i];
                    $detailsvalueitem->title = $detailsvaluemodel->title[$i];
                    $detailsvalueitem->productID = $model->id;
                    $detailsvalueitem->value = $value;
                    $detailsvalueitem->save();

                    $i++;
                }


                foreach ($multiupload->multiupload() as $file) {
                    $imgmodel = new \app\models\Productimg();
                    $imgmodel->productID = $model->id;
                    $imgmodel->img = $file;
                    $imgmodel->submitDate = Yii::$app->jdate->date('Y/m/d');
                    $imgmodel->save();
                }


                return $this->redirect(['view', 'id' => $model->id]);

            }
        }

        return $this->render('create', [
            'model' => $model,
            'multiupload' => $multiupload,
            'featurevaluemodel' => $featurevaluemodel,
            'detailsvaluemodel' => $detailsvaluemodel,
            'aboutproductmodel' => $aboutproductmodel,

        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $multiupload = new MultiUploads();
        $multiupload->imageFiles = UploadedFile::getInstances($multiupload, 'imageFiles');
        // foreach(\app\models\SubcatRelation::find()->where(['productID'=>$model->id])->all() as $subcat){
        //     $model->subcat_relation[]=$subcat->id;
        // }
        // foreach(\app\models\CategoryRelation::find()->where(['productID'=>$model->id])->all() as $cat){
        //     $model->cat_relation[]=$cat->id;

        // }
        $productCategory = \app\models\Product::find()->joinWith(['catproducts'])->where(['catproduct_product.product_id' => $id])->all();
        $aboutproductitem = \app\models\Aboutproduct::find()->Where(['productID' => $id])->all();
        $featurevaluemodel = \app\models\Featurevalue::find()->Where(['productID' => $id])->all();
        $detailsvaluemodel = \app\models\Detailsvalue::find()->Where(['productID' => $id])->all();
        $categoryrelationmodel = \app\models\CategoryRelation::find()->Where(['productID' => $id])->all();
        $subcatrelationemodel = \app\models\SubcatRelation::find()->Where(['productID' => $id])->all();


        if ($model->load(Yii::$app->request->post())) {

            $model->submitDate = Yii::$app->jdate->date('Y/m/d');
            // $model->save();
            // var_dump($model->catproductID);exit;

            if ($model->save()) {

                if ($selectedCategories = Yii::$app->request->post('product_category_relation')) {

                    ProductCategory::deleteAll('product_id = :product_id', array(':product_id' => $id));
                    foreach ($selectedCategories as $selectedCategory) {
                        $productCategory = new \app\models\ProductCategory();
                        $productCategory->product_id = $id;
                        $productCategory->category_product_id = $selectedCategory;

                        $productCategory->save();
                    }

                }


                //var_dump( $categoryrelationmodel);exit;
                if ($categoryrelationmodel) {
                    if (\app\models\CategoryRelation::find()->Where(['productID' => $id])->count() > 0) {
                        foreach (\app\models\CategoryRelation::find()->Where(['productID' => $id])->all() as $item) {
                            $item->delete();
                        }
                    }
                    if (Yii::$app->request->post('cat_relation')) {
                        foreach (Yii::$app->request->post('cat_relation') as $_cat) {
                            $cat = new \app\models\CategoryRelation();
                            $cat->catID = $_cat;
                            $cat->productID = $model->id;
                            $cat->save();
                        }
                    }
                } elseif ($model->cat_relation) {
                    foreach ($model->cat_relation as $_cat) {
                        $cat = new \app\models\CategoryRelation();
                        $cat->catID = $_cat;
                        $cat->productID = $model->id;
                        $cat->save();
                    }
                }


                if ($subcatrelationemodel) {
                    if (\app\models\SubcatRelation::find()->Where(['productID' => $id])->count() > 0) {
                        foreach (\app\models\SubcatRelation::find()->Where(['productID' => $id])->all() as $item) {
                            $item->delete();
                        }
                    }

                    if (Yii::$app->request->post('subcat_relation')) {
                        foreach (Yii::$app->request->post('subcat_relation') as $_subcat) {
                            $subcat = new \app\models\SubcatRelation();
                            $subcat->subcatID = $_subcat;
                            $subcat->productID = $model->id;
                            $subcat->save();
                        }
                    }

                } else {
                    if ($model->subcat_relation) {
                        foreach ($model->subcat_relation as $_subcat) {
                            $subcat = new \app\models\SubcatRelation();
                            $subcat->subcatID = $_subcat;
                            $subcat->productID = $model->id;
                            $subcat->save();
                        }
                    }
                }


                // ///about product field 
                foreach (Yii::$app->request->post('details') as $key => $value) {
                    $aboutproductmodelitem = \app\models\Aboutproduct::findOne($key);
                    $aboutproductmodelitem->details = $value;
                    $aboutproductmodelitem->save();
                }
                if (Yii::$app->request->post('detailsproduct')) {
                    // ///feature product field
                    foreach (Yii::$app->request->post('detailsproduct') as $value) {
                        $aboutproductmodelitems = new \app\models\Aboutproduct();
                        $aboutproductmodelitems->productID = $model->id;
                        $aboutproductmodelitems->details = $value;
                        $aboutproductmodelitems->save();
                    }
                }

                if (Yii::$app->request->post('Productvalue')) {
                    $i = 0;
                    foreach (Yii::$app->request->post('Productvalue') as $value) {
                        if ($value != null && $value != "") {

                            $productFeatureId = Yii::$app->request->post('ProductfeatureID');
                            $productFeatureprice = Yii::$app->request->post('Productprice');
                            $productFeaturecount = Yii::$app->request->post('Productcount');
                            $featurevaluemodelitems = new \app\models\Featurevalue();
                            $featurevaluemodelitems->featureID = intval($productFeatureId[$i]);
                            $featurevaluemodelitems->productID = $model->id;
                            $featurevaluemodelitems->value = $value;
                            $featurevaluemodelitems->price = intval($productFeatureprice[$i]);
                            $featurevaluemodelitems->count = intval($productFeaturecount[$i]);
                            $featurevaluemodelitems->save();
                            $i++;
                            //var_dump($featurevaluemodelitems->errors);
                        }
                    }
                }


                if (Yii::$app->request->post('detailsvaluetitle')) {
                    $j = 0;
                    foreach (Yii::$app->request->post('detailsvaluetitle') as $value) {
                        $detailsvalueID = Yii::$app->request->post('detailsvalueID');
                        $detailsvaluevalue = Yii::$app->request->post('detailsvaluevalue');
                        $detailsvaluemodelitem = new \app\models\Detailsvalue();
                        $detailsvaluemodelitem->detailsID = intval($detailsvalueID[$j]);
                        $detailsvaluemodelitem->productID = $model->id;
                        $detailsvaluemodelitem->title = $value;
                        $detailsvaluemodelitem->value = $detailsvaluevalue[$j];
                        $detailsvaluemodelitem->save();
                        $j++;
                        //var_dump($featurevaluemodelitems->errors);
                    }
                }
                // var_dump(Yii::$app->request->post('value'));exit;
                // ///feature product field
                if (Yii::$app->request->post('value') != null) {
                    foreach (Yii::$app->request->post('value') as $key => $value) {
                        $featurevaluemodelitem = \app\models\Featurevalue::findOne($key);
                        $featurevaluemodelitem->value = $value;
                        $featurevaluemodelitem->save();
                    }
                }
                if (Yii::$app->request->post('price') != null) {
                    foreach (Yii::$app->request->post('price') as $key => $value) {
                        $featurevaluemodelitem = \app\models\Featurevalue::findOne($key);
                        $featurevaluemodelitem->price = $value;
                        $featurevaluemodelitem->save();
                    }
                }
                if (Yii::$app->request->post('count') != null) {
                    foreach (Yii::$app->request->post('count') as $key => $value) {
                        $featurevaluemodelitem = \app\models\Featurevalue::findOne($key);
                        $featurevaluemodelitem->count = $value;
                        $featurevaluemodelitem->save();
                    }
                }


                // ///details product field
                foreach (Yii::$app->request->post('titledetails') as $key => $value) {
                    $detailsvaluemodelitem = \app\models\Detailsvalue::findOne($key);
                    $detailsvaluemodelitem->title = $value;
                    $detailsvaluemodelitem->save();
                }
                foreach (Yii::$app->request->post('valuedetails') as $key => $value) {
                    $detailsvaluemodelitem = \app\models\Detailsvalue::findOne($key);
                    $detailsvaluemodelitem->value = $value;
                    $detailsvaluemodelitem->save();
                }

                // if($multiupload->multiupload('imageFiles')){ 
                //     if(\app\models\Productimg::find()->Where(['productID'=>$id])->all()){
                //         foreach(\app\models\Productimg::find()->Where(['productID'=>$id])->all() as $img){
                //             $img->delete();
                //         }
                if (isset($multiupload->imageFiles) && $multiupload->imageFiles != null) {
                    foreach (\app\models\Productimg::find()->where(['productID' => $id])->all() as $image) {
                        $image->delete();
                    }

                    foreach ($multiupload->multiupload() as $file) {
                        $imgmodel = new \app\models\Productimg();
                        $imgmodel->productID = $model->id;
                        $imgmodel->img = $file;
                        $imgmodel->submitDate = Yii::$app->jdate->date('Y/m/d');
                        $imgmodel->save();

                    }
                }

                if (\app\models\Letme::find()->Where(['productID' => $id])->andWhere(['status' => 0])->andWhere(['size' => null])->all()) {
                    foreach (\app\models\Letme::find()->Where(['productID' => $id])->andWhere(['status' => 0])->andWhere(['size' => null])->all() as $letme) {

                        if (\app\models\Product::find()->Where(['id' => $id])->andWhere(['>', 'count', 0])->one()) {
                            $text = "بی سی سی \n" . "محصول: \n" . $letme->products->name . "موجود شد \n" . "http://www.bccstyle.com/product/" . $letme->productID;
                            \Yii::$app->queue->push(new SendSms([
                                'message' => $text,
                                'number' => $letme->mobile,
                            ]));
                            $letme->status = 1;
                            $letme->save();
                        }
                    }
                }
                if (\app\models\Letme::find()->Where(['productID' => $id])->andWhere(['status' => 0])->andWhere(['not', ['size' => null]])->all()) {
                    foreach (\app\models\Letme::find()->Where(['productID' => $id])->andWhere(['status' => 0])->andWhere(['not', ['size' => null]])->all() as $letme) {
                        // $letid[$letme->size]=$letme->size;
                        // $letmobile[$letme->mobile]=$letme->mobile;


                        foreach (\app\models\Featurevalue::find()->Where(['id' => $letme->size])->all() as $size) {
                            if (($size->count) > '0') {
                                $feature = \app\models\Featurevalue::find()->Where(['id' => $size->id])->one();
                                $text = "بی سی سی \n" . "محصول: \n" . $letme->products->name . "سایز\n" . $feature->value . "موجود شد \n" . "http://www.bccstyle.com/product/" . $letme->productID;
                                \Yii::$app->queue->push(new SendSms([
                                    'message' => $text,
                                    'number' => $letme->mobile,
                                ]));
                                $letme->status = 1;
                                $letme->save();

                            }
                        }
                    }
                }


                return $this->redirect(['view', 'id' => $model->id]);

            }
        }


        return $this->render('update', [
            'model' => $model,
            'multiupload' => $multiupload,
            'aboutproductitem' => $aboutproductitem,
            'featurevaluemodel' => $featurevaluemodel,
            'detailsvaluemodel' => $detailsvaluemodel,
            'categoryrelationmodel' => $categoryrelationmodel,
            'subcatrelationemodel' => $subcatrelationemodel,
            'productCategory' => $productCategory,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
