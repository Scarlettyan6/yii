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
            [['dataset_id'], 'exist', 'skipOnError' => true, 'targetClass' => WarDataset::class, 'targetAttribute' => ['dataset_id' => 'id']],
        ];
    }

    public function getDataset()
    {
        return $this->hasOne(WarDataset::class, ['id' => 'dataset_id']);
    }
}
