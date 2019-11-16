<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bascket;

/**
 * BascketSearch represents the model behind the search form of `app\models\Bascket`.
 */
class BascketSearch extends Bascket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cartID', 'recived', 'stateID', 'cityID', 'tel', 'mobile', 'timeID', 'count', 'amount', 'status'], 'integer'],
            [['name', 'family', 'address', 'day', 'description', 'discount', 'memeber', 'authority', 'refID', 'submitDate'], 'safe'],
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
        $query = Bascket::find()->orderBy(['id'=>SORT_DESC]); 

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
            'cartID' => $this->cartID,
            'recived' => $this->recived,
            'stateID' => $this->stateID,
            'cityID' => $this->cityID,
            'tel' => $this->tel,
            'mobile' => $this->mobile,
            'timeID' => $this->timeID,
            'count' => $this->count,
            'amount' => $this->amount,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'family', $this->family])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'day', $this->day])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'discount', $this->discount])
            ->andFilterWhere(['like', 'memeber', $this->memeber])
            ->andFilterWhere(['like', 'authority', $this->authority])
            ->andFilterWhere(['like', 'refID', $this->refID])
            ->andFilterWhere(['like', 'submitDate', $this->submitDate]);

        return $dataProvider;
    }
}
