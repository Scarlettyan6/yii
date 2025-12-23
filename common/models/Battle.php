<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "battle".
 *
 * @property int $id
 * @property string $name
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $main_location 主要地点文字
 * @property float|null $main_latitude 主要地点纬度
 * @property float|null $main_longitude 主要地点经度
 * @property string|null $description
 * @property string|null $result
 * @property string|null $casualties_china 中方伤亡
 * @property string|null $casualties_japan 日方伤亡
 * @property int $created_at
 * @property int $updated_at
 */
class Battle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'battle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['main_latitude', 'main_longitude'], 'number'],
            [['description', 'result'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'casualties_china', 'casualties_japan'], 'string', 'max' => 255],
            [['main_location'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '战役名称',
            'start_date' => '开始日期',
            'end_date' => '结束日期',
            'main_location' => '主要地点',
            'main_latitude' => '纬度',
            'main_longitude' => '经度',
            'description' => '描述',
            'result' => '结果',
            'casualties_china' => '中国伤亡',
            'casualties_japan' => '日本伤亡',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function getMapMarkers()
    {
        return $this->hasMany(MapMarker::class, ['battle_id' => 'id']);
    }
}
