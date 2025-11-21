<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MapMarker;

/**
 * MapMarkerSearch represents the model behind the search form of `common\models\MapMarker`.
 */
class MapMarkerSearch extends MapMarker
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'battle_id'], 'integer'],
            [['title', 'description', 'marker_type'], 'safe'],
            [['latitude', 'longitude'], 'number'],
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
        $query = MapMarker::find();

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
            'battle_id' => $this->battle_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'marker_type', $this->marker_type]);
            
        // (为了让战役名称可搜索，我们关联战役表)
        $query->joinWith('battle');
        $dataProvider->sort->attributes['battle.name'] = [
            'asc' => ['battle.name' => SORT_ASC],
            'desc' => ['battle.name' => SORT_DESC],
        ];

        return $dataProvider;
    }
}