<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "additional_info".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $category_id
 * @property string|null $created_at
 *
 * @property Categories $category
 */
class AdditionalInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'additional_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['category_id'], 'default', 'value' => null],
            [['category_id'], 'integer'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование',
            'description' => 'Описание',
            'category_id' => 'Категория',
            'created_at' => 'Дата создания',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
