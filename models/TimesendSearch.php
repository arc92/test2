<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Timesend;

/**
 * TimesendSearch represents the model behind the search form of `app\models\Timesend`.
 */
class TimesendSearch extends Timesend
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'countSend'], 'integer'],
            [['time1', 'submitDate'], 'safe'],
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
        $query = Timesend::find();

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
            'countSend' => $this->countSend,
        ]);

        $query->andFilterWhere(['like', 'time1', $this->time1])
            ->andFilterWhere(['like', 'submitDate', $this->submitDate]);

        return $dataProvider;
    }
}
