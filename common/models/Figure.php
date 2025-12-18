<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "figure".
 *
 * @property int $id
 * @property string $name
 * @property string|null $birth_date 出生日期(文本)
 * @property string|null $death_date 逝世日期(文本)
 * @property string|null $biography 人物简介
 * @property string|null $achievements 主要功绩
 * @property string|null $cover_image_url
 * @property int $created_at
 * @property int $updated_at
 */
class Figure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'figure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['biography', 'achievements'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['birth_date', 'death_date'], 'string', 'max' => 50],
            [['cover_image_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'birth_date' => 'Birth Date',
            'death_date' => 'Death Date',
            'biography' => 'Biography',
            'achievements' => 'Achievements',
            'cover_image_url' => 'Cover Image Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
