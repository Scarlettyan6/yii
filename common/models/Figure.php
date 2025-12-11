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
            'name' => 'Name',
            'biography' => 'Biography',
            'achievements' => 'Achievements',
            'cover_image_url' => 'Cover Image Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public function getFigureBattles()
    {
        return $this->hasMany(FigureBattle::class, ['figure_id' => 'id']);
    }

    public function getBattles()
    {
        return $this->hasMany(Battle::class, ['id' => 'battle_id'])->via('figureBattles');
    }
}
