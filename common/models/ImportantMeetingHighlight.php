<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "important_meeting_highlight".
 *
 * @property int $id
 * @property int $meeting_id
 * @property string $title
 * @property string|null $description
 * @property int|null $display_order
 * @property int $created_at
 * @property int $updated_at
 *
 * @property ImportantMeeting $meeting
 */
class ImportantMeetingHighlight extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public static function tableName()
    {
        return 'important_meeting_highlight';
    }

    public function rules()
    {
        return [
            [['meeting_id', 'title'], 'required'],
            [['meeting_id', 'display_order', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['meeting_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImportantMeeting::class, 'targetAttribute' => ['meeting_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'meeting_id' => '所属会议',
            'title' => '亮点/议题标题',
            'description' => '补充说明',
            'display_order' => '显示顺序',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function getMeeting()
    {
        return $this->hasOne(ImportantMeeting::class, ['id' => 'meeting_id']);
    }
}
