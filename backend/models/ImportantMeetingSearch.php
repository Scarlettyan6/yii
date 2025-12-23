<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ImportantMeeting;

/**
 * ImportantMeetingSearch represents the model behind the search form of `common\models\ImportantMeeting`.
 */
class ImportantMeetingSearch extends ImportantMeeting
{
    public function rules()
    {
        return [
            [['id', 'display_order', 'created_at', 'updated_at'], 'integer'],
            [['is_active'], 'boolean'],
            [['title', 'meeting_date', 'location', 'cover_image', 'link_url', 'summary'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied.
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ImportantMeeting::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['display_order' => SORT_ASC, 'meeting_date' => SORT_DESC, 'id' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'meeting_date' => $this->meeting_date,
            'display_order' => $this->display_order,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'cover_image', $this->cover_image])
            ->andFilterWhere(['like', 'link_url', $this->link_url])
            ->andFilterWhere(['like', 'summary', $this->summary]);

        return $dataProvider;
    }
}
