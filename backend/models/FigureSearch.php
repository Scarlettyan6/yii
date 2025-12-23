<?php

namespace backend\models;

/*
* Team: 实验楼C4
* Coding by 谢闻星, 2310500
* This is the Figure search model for backend management of historical figures column.
*/

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Figure;

/**
 * FigureSearch represents the model for displaying `common\models\Figure` records.
 */
class FigureSearch extends Model
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * Creates data provider instance for displaying Figure records
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Figure::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => ['pageSize' => 20],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // exclude logically deleted records
        $query->andWhere(['deleted_at' => null]);

        return $dataProvider;
    }
}
