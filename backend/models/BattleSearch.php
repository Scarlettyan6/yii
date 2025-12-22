<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Battle;

/**
 * BattleSearch represents the model behind the search form of `common\models\Battle`.
 */
class BattleSearch extends Battle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'start_date', 'end_date', 'main_location', 'description', 'result', 'casualties_china', 'casualties_japan'], 'safe'],
            [['main_latitude', 'main_longitude'], 'number'],
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
        $query = Battle::find();

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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'main_latitude' => $this->main_latitude,
            'main_longitude' => $this->main_longitude,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'main_location', $this->main_location])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'casualties_china', $this->casualties_china])
            ->andFilterWhere(['like', 'casualties_japan', $this->casualties_japan]);

        return $dataProvider;
    }
}
