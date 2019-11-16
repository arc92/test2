<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mysize;

/**
 * MysizeSearch represents the model behind the search form of `app\models\Mysize`.
 */
class MysizeSearch extends Mysize
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['age', 'height', 'weight', 'waist', 'hip', 'round', 'arm', 'wrist'], 'safe'],
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
        $query = Mysize::find();

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

        $query->andFilterWhere(['like', 'age', $this->age])
            ->andFilterWhere(['like', 'height', $this->height])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'waist', $this->waist])
            ->andFilterWhere(['like', 'hip', $this->hip])
            ->andFilterWhere(['like', 'round', $this->round])
            ->andFilterWhere(['like', 'arm', $this->arm])
            ->andFilterWhere(['like', 'wrist', $this->wrist]);

        return $dataProvider;
    }
}
