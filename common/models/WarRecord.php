<?php
namespace common\models;

use yii\db\ActiveRecord;

class WarRecord extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%war_record}}';
    }

    public function rules()
    {
        return [
            [['dataset_id', 'data_json'], 'required'],
            [['dataset_id', 'row_index', 'created_at', 'updated_at'], 'integer'],
            [['data_json'], 'string'],
        ];
    }

    public function getDataset()
    {
        return $this->hasOne(WarDataset::class, ['id' => 'dataset_id']);
    }

    public function getDataArray(): array
    {
        $arr = json_decode($this->data_json, true);
        return is_array($arr) ? $arr : [];
    }

    public function setDataArray(array $arr): void
    {
        $this->data_json = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
