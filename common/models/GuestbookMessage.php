<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "guestbook_message".
 *
 * @property int $id
 * @property string|null $nickname
 * @property string $content
 * @property int|null $is_approved
 * @property int $created_at
 * @property int $updated_at
 */
class GuestbookMessage extends \yii\db\ActiveRecord
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
        return 'guestbook_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['nickname'], 'string', 'max' => 100],
            [['is_approved'], 'boolean'],
            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => '昵称',
            'content' => '留言内容',
            'is_approved' => '审核状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
