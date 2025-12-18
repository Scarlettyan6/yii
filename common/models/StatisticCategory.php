<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class StatisticCategory extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%statistic_category}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['name', 'slug', 'chart_type'], 'required'],
            [['description', 'source_note'], 'string'],
            [['sort'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 128],
            [['chart_type'], 'string', 'max' => 32],
            [['unit'], 'string', 'max' => 32],
            [['slug'], 'unique'],
        ];
    }

    public function getStatistics()
    {
        return $this->hasMany(Statistic::class, ['category_id' => 'id'])
            ->orderBy(['sort' => SORT_ASC, 'id' => SORT_ASC]);
    }
}
