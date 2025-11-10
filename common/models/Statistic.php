<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statistic".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title 数据标题
 * @property string $value 数据值(文本)
 * @property string|null $unit 单位
 * @property string|null $description
 * @property string|null $source 数据来源
 * @property int|null $display_order
 *
 * @property StatisticCategory $category
 */
class Statistic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statistic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'value'], 'required'],
            [['category_id', 'display_order'], 'integer'],
            [['description'], 'string'],
            [['title', 'source'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 100],
            [['unit'], 'string', 'max' => 50],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => StatisticCategory::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => '类别 ID',
            'title' => '数据标题',
            'value' => '数据值',
            'unit' => '单位',
            'description' => '描述',
            'source' => '数据来源',
            'display_order' => '显示顺序',
        ];
    }

    /**
     * 获取关联的 Category (统计类别)
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(StatisticCategory::class, ['id' => 'category_id']);
    }
}