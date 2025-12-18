<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "figure_role".
 *
 * @property int $figure_id
 * @property int $role_id
 *
 * @property Figure $figure
 * @property Role $role
 */
class FigureRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'figure_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['figure_id', 'role_id'], 'required'],
            [['figure_id', 'role_id'], 'integer'],
            [['figure_id', 'role_id'], 'unique', 'targetAttribute' => ['figure_id', 'role_id']],
            [['figure_id'], 'exist', 'skipOnError' => true, 'targetClass' => Figure::class, 'targetAttribute' => ['figure_id' => 'id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'figure_id' => '人物 ID',
            'role_id' => '角色 ID',
        ];
    }

    /**
     * 获取关联的 Figure (人物)
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFigure()
    {
        return $this->hasOne(Figure::class, ['id' => 'figure_id']);
    }

    /**
     * 获取关联的 Role (角色)
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }
}