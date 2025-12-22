<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\HomepageFeature;

/**
 * HomepageFeatureSearch represents the model behind the search form of `common\models\HomepageFeature`.
 */
class HomepageFeatureSearch extends HomepageFeature
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'display_order', 'created_at', 'updated_at'], 'integer'],
            [['is_active'], 'boolean'],
            [['title', 'subtitle', 'image_url', 'link_url'], 'safe'],
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
        $query = HomepageFeature::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['display_order' => SORT_ASC, 'id' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'display_order' => $this->display_order,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'image_url', $this->image_url])
            ->andFilterWhere(['like', 'link_url', $this->link_url]);

        return $dataProvider;
    }
}
