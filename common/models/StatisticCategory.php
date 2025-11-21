<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statistic_category".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 */
class StatisticCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statistic_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    public function getStatistics()
    {
        return $this->hasMany(Statistic::class, ['category_id' => 'id']);
    }
}
