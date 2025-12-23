<?php

namespace backend\models;

/*
* Team: 实验楼C4
* Coding by 姚智博, 2313557
*/

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WarRecord;

/**
 * WarRecordSearch represents the model for displaying `common\models\WarRecord` records.
 */
class WarRecordSearch extends Model
{
    public $id;
    public $dataset_id;
    public $row_index;
    public $data_json;
    public $created_at;
    public $updated_at;
    public $q; // 搜索关键词

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'dataset_id', 'row_index', 'created_at', 'updated_at'], 'integer'],
            [['data_json', 'q'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'q' => '搜索关键词',
        ];
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
        $query = WarRecord::find()->with('dataset');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ]
            ],
            'pagination' => ['pageSize' => 50],
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
            'dataset_id' => $this->dataset_id,
            'row_index' => $this->row_index,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        if (!empty($this->q)) {
            $query->andFilterWhere(['like', 'data_json', $this->q]);
        }

        return $dataProvider;
    }
}
