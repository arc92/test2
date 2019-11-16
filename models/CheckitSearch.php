<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Checkit;

/**
 * CheckitSearch represents the model behind the search form of `app\models\Checkit`.
 */
class CheckitSearch extends Checkit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'productID', 'rate', 'status'], 'integer'],
            [['name', 'userEmail', 'usercheck', 'submitDate'], 'safe'],
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
        $query = Checkit::find();

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
            'productID' => $this->productID,
            'rate' => $this->rate,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'userEmail', $this->userEmail])
            ->andFilterWhere(['like', 'usercheck', $this->usercheck])
            ->andFilterWhere(['like', 'submitDate', $this->submitDate]);

        return $dataProvider;
    }
}
