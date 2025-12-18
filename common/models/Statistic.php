<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Statistic extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%statistic}}';
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
            [['category_id', 'label'], 'required'],
            [['category_id', 'sort'], 'integer'],
            [['value'], 'number'],
            [['extra_json'], 'string'],
            [['label'], 'string', 'max' => 64],
            [['series'], 'string', 'max' => 64],
            [['category_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => StatisticCategory::class,
                'targetAttribute' => ['category_id' => 'id']
            ],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(StatisticCategory::class, ['id' => 'category_id']);
    }
}
