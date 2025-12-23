<?php

namespace common\models;

use Yii;
use common\models\Figure;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Url;

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
            'title' => '标题',
            'type' => '媒体类型',
            'url' => '链接地址',
            'path' => '文件路径',
            'description' => '描述',
            'linkable_type' => '关联类型',
            'linkable_id' => '关联ID',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
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
        // 优先使用 path 作为封面（建议存封面图）
        if (!empty($this->path)) {
            return $this->normalizeUrl($this->path);
        }

        // 其次使用 url（如果填的是图片链接也可用）
        if (!empty($this->url)) {
            return $this->normalizeUrl($this->url);
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

    /**
     * 规范化为可访问的 URL：
     * - 已包含 http/https 直接返回
     * - 其他视为相对路径，自动补全域名和 @web 前缀
     */
    protected function normalizeUrl(string $path): string
    {
        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        $relative = ltrim($path, '/');
        return Url::to('@web/' . $relative, true);
    }
}
