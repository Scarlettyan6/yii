<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "important_meeting".
 *
 * @property int $id
 * @property string $title
 * @property string|null $meeting_date
 * @property string|null $location
 * @property string|null $cover_image
 * @property string|null $link_url
 * @property string|null $summary
 * @property int|null $display_order
 * @property bool|null $is_active
 * @property int $created_at
 * @property int $updated_at
 *
 * @property ImportantMeetingHighlight[] $highlights
 */
class ImportantMeeting extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public static function tableName()
    {
        return 'important_meeting';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['meeting_date'], 'default', 'value' => null],
            [['meeting_date'], 'match', 'pattern' => '/^\d{4}-\d{2}-\d{2}$/', 'skipOnEmpty' => true, 'message' => '日期格式应为YYYY-MM-DD'],
            [['summary'], 'string'],
            [['display_order', 'created_at', 'updated_at'], 'integer'],
            [['is_active'], 'boolean'],
            [['title', 'location', 'cover_image', 'link_url'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '会议标题',
            'meeting_date' => '会议日期',
            'location' => '地点',
            'cover_image' => '封面图',
            'link_url' => '外链/详情地址',
            'summary' => '摘要',
            'display_order' => '显示顺序',
            'is_active' => '是否展示',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function getHighlights()
    {
        return $this->hasMany(ImportantMeetingHighlight::class, ['meeting_id' => 'id'])
            ->orderBy(['display_order' => SORT_ASC, 'id' => SORT_ASC]);
    }
}
