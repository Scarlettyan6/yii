<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "timeline_event".
 *
 * @property int $id
 * @property string $event_date
 * @property string $title
 * @property string|null $description
 * @property string|null $cover_image_url
 * @property int|null $importance
 * @property int $created_at
 * @property int $updated_at
 */
class TimelineEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timeline_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_date', 'title'], 'required'],
            [['event_date'], 'safe'],
            [['description'], 'string'],
            [['importance', 'created_at', 'updated_at'], 'integer'],
            [['title', 'cover_image_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_date' => '事件日期',
            'title' => '标题',
            'description' => '描述',
            'cover_image_url' => '封面图片',
            'importance' => '重要性',
            'created_at' => '创建于',
            'updated_at' => '更新于',
        ];
    }
}