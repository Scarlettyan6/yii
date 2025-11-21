<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "map_marker".
 *
 * @property int $id
 * @property int $battle_id 关联战役ID
 * @property string $title
 * @property string|null $description
 * @property float $latitude
 * @property float $longitude
 * @property string|null $marker_type 标记类型
 *
 * @property Battle $battle
 */
class MapMarker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'map_marker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['battle_id', 'title', 'latitude', 'longitude'], 'required'],
            [['battle_id'], 'integer'],
            [['description'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['marker_type'], 'string', 'max' => 50],
            [['battle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Battle::class, 'targetAttribute' => ['battle_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'battle_id' => '战役 ID',
            'title' => '标记标题',
            'description' => '描述',
            'latitude' => '纬度',
            'longitude' => '经度',
            'marker_type' => '标记类型',
        ];
    }

    /**
     * 获取关联的 Battle (战役)
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBattle()
    {
        return $this->hasOne(Battle::class, ['id' => 'battle_id']);
    }
}