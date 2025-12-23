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

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dataset_id' => '数据集ID',
            'row_index' => '行索引',
            'data_json' => '数据(JSON)',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function getDataset()
    {
        return $this->hasOne(WarDataset::class, ['id' => 'dataset_id']);
    }
}
