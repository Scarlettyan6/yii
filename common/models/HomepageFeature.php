<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "homepage_feature".
 *
 * @property int $id
 * @property string $title
 * @property string|null $subtitle
 * @property string|null $description
 * @property string $image_url
 * @property string $link_url
 * @property int|null $display_order
 * @property bool|null $is_active
 * @property int $created_at
 * @property int $updated_at
 */
class HomepageFeature extends \yii\db\ActiveRecord
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
        return 'homepage_feature';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'image_url', 'link_url'], 'required'],
            [['description'], 'string'],
            [['display_order', 'created_at', 'updated_at'], 'integer'],
            [['is_active'], 'boolean'],
            [['title', 'subtitle', 'image_url', 'link_url'], 'string', 'max' => 255],
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
            'subtitle' => '副标题',
            'description' => '描述',
            'image_url' => '图片地址',
            'link_url' => '跳转链接',
            'display_order' => '显示顺序',
            'is_active' => '是否启用',
            'created_at' => '创建于',
            'updated_at' => '更新于',
        ];
    }
}
