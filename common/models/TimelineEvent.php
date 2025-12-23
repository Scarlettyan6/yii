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

    /**
     * 获取完整的封面图片URL
     */
    public function getCoverImageUrl()
    {
        if (empty($this->cover_image_url)) {
            return null;
        }

        // 如果已经是完整的URL，直接返回
        if (strpos($this->cover_image_url, 'http') === 0) {
            return $this->cover_image_url;
        }

        // 如果以 / 开头，认为是相对于web根目录的路径
        if (strpos($this->cover_image_url, '/') === 0) {
            return \Yii::getAlias('@web') . $this->cover_image_url;
        }

        // 其他情况，直接使用
        return $this->cover_image_url;
    }
}