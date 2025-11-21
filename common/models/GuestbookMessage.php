<?php

namespace common\models;

use Yii;

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
            [['content', 'created_at', 'updated_at'], 'required'],
            [['content'], 'string'],
            [['is_approved', 'created_at', 'updated_at'], 'integer'],
            [['nickname'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'Nickname',
            'content' => 'Content',
            'is_approved' => 'Is Approved',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
