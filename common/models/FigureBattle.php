<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "figure_battle".
 *
 * @property int $id
 * @property int $figure_id
 * @property int $battle_id
 * @property int $created_at
 */
class FigureBattle extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'figure_battle';
    }

    public function rules()
    {
        return [
            [['figure_id', 'battle_id', 'created_at'], 'required'],
            [['figure_id', 'battle_id', 'created_at'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'figure_id' => 'Figure ID',
            'battle_id' => 'Battle ID',
            'created_at' => 'Created At',
        ];
    }

    public function getFigure()
    {
        return $this->hasOne(Figure::class, ['id' => 'figure_id']);
    }

    public function getBattle()
    {
        return $this->hasOne(Battle::class, ['id' => 'battle_id']);
    }
}
