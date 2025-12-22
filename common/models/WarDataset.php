<?php
namespace common\models;

use yii\db\ActiveRecord;

class WarDataset extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%war_dataset}}';
    }

    public function rules()
    {
        return [
            [['key', 'name', 'source_file'], 'required'],
            [['description'], 'string'],
            [['display_order', 'is_active', 'created_at', 'updated_at'], 'integer'],
            [['key'], 'string', 'max' => 128],
            [['name', 'source_file'], 'string', 'max' => 255],
            [['key'], 'unique'],
        ];
    }

    public function getRecords()
    {
        return $this->hasMany(WarRecord::class, ['dataset_id' => 'id']);
    }
}
