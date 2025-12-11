<?php

namespace common\models;

use Yii;
use common\models\Figure;
use yii\behaviors\TimestampBehavior;

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
    public const TYPE_IMAGE = 1;
    public const TYPE_TV = 2;
    public const TYPE_DOCUMENTARY = 3;
    public const TYPE_MOVIE = 4;
    public const TYPE_CLIP = 5;
    public const TYPE_AUDIO = 6;
    public const TYPE_OTHER = 7;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media_resource';
    }

    /**
     * 自动维护创建/更新时间戳。
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
    public function rules()
    {
        return [
            [['title', 'type'], 'required'],
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

    /**
     * Returns human readable label for current type.
     */
    public function getTypeLabel(): string
    {
        return static::typeLabels()[$this->type] ?? '未知类型';
    }

    /**
     * Map of available media types.
     */
    public static function typeLabels(): array
    {
        return [
            static::TYPE_TV => '电视剧',
            static::TYPE_DOCUMENTARY => '纪录片',
            static::TYPE_MOVIE => '电影',
            static::TYPE_CLIP => '剪辑',
            static::TYPE_AUDIO => '音频',
            static::TYPE_IMAGE => '图片',
            static::TYPE_OTHER => '其他',
        ];
    }

    /**
     * Cover or poster URL with a safe fallback.
     */
    public function getCoverUrl(): string
    {
        if (!empty($this->url)) {
            return $this->url;
        }
        if (!empty($this->path)) {
            return $this->path;
        }
        return 'https://via.placeholder.com/400x600?text=Media';
    }

    /**
     * Resolve linked figure if this media is attached to a Figure.
     */
    public function getLinkedFigure(): ?Figure
    {
        if ($this->linkable_type === Figure::class && $this->linkable_id) {
            return Figure::findOne($this->linkable_id);
        }
        return null;
    }
}
