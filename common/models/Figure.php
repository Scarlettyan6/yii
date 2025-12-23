<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "figure".
 *
 * @property int $id
 * @property string $name
 * @property string|null $biography
 * @property string|null $achievements
 * @property string|null $cover_image_url
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $deleted_at logical delete timestamp
 */
class Figure extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'figure';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['biography', 'achievements'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['cover_image_url'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'biography' => '生平',
            'achievements' => '成就',
            'cover_image_url' => '封面图片',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
        ];
    }
}
