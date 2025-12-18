<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FigureRole;

/**
 * FigureRoleSearch represents the model behind the search form of `common\models\FigureRole`.
 */
class FigureRoleSearch extends FigureRole
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['figure_id', 'role_id'], 'integer'],
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
        $query = FigureRole::find();

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
            'figure_id' => $this->figure_id,
            'role_id' => $this->role_id,
        ]);
        
        $query->joinWith(['figure', 'role']);

        return $dataProvider;
    }
}