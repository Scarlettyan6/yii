<?php
namespace backend\models;

/*
* Team: 实验楼C4
* Coding by 杜子妍, 2313312
* This is the ImportantMeetingHighlight search model for backend management of anti-Japanese war important meeting highlights.
*/

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ImportantMeetingHighlight;

/**
 * ImportantMeetingHighlightSearch represents the model behind the search form of `common\models\ImportantMeetingHighlight`.
 */
class ImportantMeetingHighlightSearch extends ImportantMeetingHighlight
{
    public function rules()
    {
        return [
            [['id', 'meeting_id', 'display_order', 'created_at', 'updated_at'], 'integer'],
            [['title', 'description'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ImportantMeetingHighlight::find()->with('meeting');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['meeting_id' => SORT_ASC, 'display_order' => SORT_ASC, 'id' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'meeting_id' => $this->meeting_id,
            'display_order' => $this->display_order,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
