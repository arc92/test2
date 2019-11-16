<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Setting;

/**
 * SettingSearch represents the model behind the search form of `app\models\Setting`.
 */
class SettingSearch extends Setting
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['sitename', 'logo', 'about', 'footerlogo', 'title', 'description', 'title_contactus', 'description_contactus', 'title_aboutus', 'description_aboutus', 'title_faq', 'description_faq', 'title_transport', 'description_transport', 'title_size', 'description_size', 'title_blog', 'description_blog', 'title_blogsingle', 'description_blogsingle', 'title_branches', 'description_branches', 'title_certificates', 'description_certificates', 'title_privacy', 'description_privacy', 'title_help', 'description_help', 'title_cart', 'description_cart', 'title_endstep', 'description_endstep', 'title_collection', 'description_collection', 'title_collection_inside', 'description_collection_inside', 'title_product', 'description_product', 'title_product_index', 'description_product_index', 'title_girlgrid', 'description_girlgrid', 'title_boygrid', 'description_boygrid', 'title_girlbaby', 'description_girlbaby', 'title_boybaby', 'description_boybaby', 'title_child', 'description_child', 'title_baby', 'description_baby', 'title_menulink', 'description_menulink', 'title_product_index2', 'description_product_index2', 'create_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Setting::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'sitename', $this->sitename])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'footerlogo', $this->footerlogo])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'title_contactus', $this->title_contactus])
            ->andFilterWhere(['like', 'description_contactus', $this->description_contactus])
            ->andFilterWhere(['like', 'title_aboutus', $this->title_aboutus])
            ->andFilterWhere(['like', 'description_aboutus', $this->description_aboutus])
            ->andFilterWhere(['like', 'title_faq', $this->title_faq])
            ->andFilterWhere(['like', 'description_faq', $this->description_faq])
            ->andFilterWhere(['like', 'title_transport', $this->title_transport])
            ->andFilterWhere(['like', 'description_transport', $this->description_transport])
            ->andFilterWhere(['like', 'title_size', $this->title_size])
            ->andFilterWhere(['like', 'description_size', $this->description_size])
            ->andFilterWhere(['like', 'title_blog', $this->title_blog])
            ->andFilterWhere(['like', 'description_blog', $this->description_blog])
            ->andFilterWhere(['like', 'title_blogsingle', $this->title_blogsingle])
            ->andFilterWhere(['like', 'description_blogsingle', $this->description_blogsingle])
            ->andFilterWhere(['like', 'title_branches', $this->title_branches])
            ->andFilterWhere(['like', 'description_branches', $this->description_branches])
            ->andFilterWhere(['like', 'title_certificates', $this->title_certificates])
            ->andFilterWhere(['like', 'description_certificates', $this->description_certificates])
            ->andFilterWhere(['like', 'title_privacy', $this->title_privacy])
            ->andFilterWhere(['like', 'description_privacy', $this->description_privacy])
            ->andFilterWhere(['like', 'title_help', $this->title_help])
            ->andFilterWhere(['like', 'description_help', $this->description_help])
            ->andFilterWhere(['like', 'title_cart', $this->title_cart])
            ->andFilterWhere(['like', 'description_cart', $this->description_cart])
            ->andFilterWhere(['like', 'title_endstep', $this->title_endstep])
            ->andFilterWhere(['like', 'description_endstep', $this->description_endstep])
            ->andFilterWhere(['like', 'title_collection', $this->title_collection])
            ->andFilterWhere(['like', 'description_collection', $this->description_collection])
            ->andFilterWhere(['like', 'title_collection_inside', $this->title_collection_inside])
            ->andFilterWhere(['like', 'description_collection_inside', $this->description_collection_inside])
            ->andFilterWhere(['like', 'title_product', $this->title_product])
            ->andFilterWhere(['like', 'description_product', $this->description_product])
            ->andFilterWhere(['like', 'title_product_index', $this->title_product_index])
            ->andFilterWhere(['like', 'description_product_index', $this->description_product_index])
            ->andFilterWhere(['like', 'title_girlgrid', $this->title_girlgrid])
            ->andFilterWhere(['like', 'description_girlgrid', $this->description_girlgrid])
            ->andFilterWhere(['like', 'title_boygrid', $this->title_boygrid])
            ->andFilterWhere(['like', 'description_boygrid', $this->description_boygrid])
            ->andFilterWhere(['like', 'title_girlbaby', $this->title_girlbaby])
            ->andFilterWhere(['like', 'description_girlbaby', $this->description_girlbaby])
            ->andFilterWhere(['like', 'title_boybaby', $this->title_boybaby])
            ->andFilterWhere(['like', 'description_boybaby', $this->description_boybaby])
            ->andFilterWhere(['like', 'title_child', $this->title_child])
            ->andFilterWhere(['like', 'description_child', $this->description_child])
            ->andFilterWhere(['like', 'title_baby', $this->title_baby])
            ->andFilterWhere(['like', 'description_baby', $this->description_baby])
            ->andFilterWhere(['like', 'title_menulink', $this->title_menulink])
            ->andFilterWhere(['like', 'description_menulink', $this->description_menulink])
            ->andFilterWhere(['like', 'title_product_index2', $this->title_product_index2])
            ->andFilterWhere(['like', 'description_product_index2', $this->description_product_index2])
            ->andFilterWhere(['like', 'create_date', $this->create_date]);

        return $dataProvider;
    }
}
