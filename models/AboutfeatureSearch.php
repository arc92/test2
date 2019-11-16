<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aboutfeature;

/**
 * AboutfeatureSearch represents the model behind the search form of `app\models\Aboutfeature`.
 */
class AboutfeatureSearch extends Aboutfeature
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'aboutID'], 'integer'],
            [['titr', 'about', 'years'], 'safe'],
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
        $query = Aboutfeature::find();

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
            'aboutID' => $this->aboutID,
        ]);

        $query->andFilterWhere(['like', 'titr', $this->titr])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'years', $this->years]);

        return $dataProvider;
    }
}
