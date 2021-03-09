<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $title
 * @property bool|null $is_active
 * @property string|null $created_at
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['is_active'], 'boolean'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
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
            'is_active' => 'Активность',
            'created_at' => 'Дата создания',
        ];
    }
}
