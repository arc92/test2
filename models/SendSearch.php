<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Send;

/**
 * SendSearch represents the model behind the search form of `app\models\Send`.
 */
class SendSearch extends Send
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count1', 'count2', 'status'], 'integer'],
            [['date', 'time1', 'time2'], 'safe'],
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
        $query = Send::find();

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
            'count1' => $this->count1,
            'count2' => $this->count2,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'time1', $this->time1])
            ->andFilterWhere(['like', 'time2', $this->time2]);

        return $dataProvider;
    }
}
