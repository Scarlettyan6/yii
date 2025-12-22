<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WarDataset;

/**
 * WarDatasetSearch represents the model for displaying `common\models\WarDataset` records.
 */
class WarDatasetSearch extends Model
{
    public $id;
    public $key;
    public $name;
    public $source_file;
    public $description;
    public $display_order;
    public $is_active;
    public $created_at;
    public $updated_at;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'display_order', 'is_active', 'created_at', 'updated_at'], 'integer'],
            [['key', 'name', 'source_file', 'description'], 'safe'],
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
        $query = WarDataset::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'display_order' => SORT_ASC,
                    'id' => SORT_ASC,
                ]
            ],
            'pagination' => ['pageSize' => 20],
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
            'display_order' => $this->display_order,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'source_file', $this->source_file])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
