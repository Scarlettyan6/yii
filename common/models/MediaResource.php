<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "media_resource".
 *
 * @property int $id
 * @property string $title
 * @property int $type 1:Image, 2:Video, 3:Audio, 4:Movie
 * @property string|null $url
 * @property string|null $path 本地路径
 * @property string|null $description
 * @property string|null $linkable_type 关联模型名
 * @property int|null $linkable_id 关联模型ID
 * @property int $created_at
 * @property int $updated_at
 */
class MediaResource extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media_resource';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'type', 'created_at', 'updated_at'], 'required'],
            [['type', 'linkable_id', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['title', 'url', 'path'], 'string', 'max' => 255],
            [['linkable_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'type' => 'Type',
            'url' => 'Url',
            'path' => 'Path',
            'description' => 'Description',
            'linkable_type' => 'Linkable Type',
            'linkable_id' => 'Linkable ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
