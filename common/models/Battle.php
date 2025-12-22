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
            'name' => 'Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'main_location' => 'Main Location',
            'main_latitude' => 'Main Latitude',
            'main_longitude' => 'Main Longitude',
            'description' => 'Description',
            'result' => 'Result',
            'casualties_china' => 'Casualties China',
            'casualties_japan' => 'Casualties Japan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getMapMarkers()
    {
        return $this->hasMany(MapMarker::class, ['battle_id' => 'id']);
    }
}
