<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $image
 * @property string|null $created_at
 * @property string|null $author
 * @property string|null $source
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'author', 'source'], 'string'],
            [['created_at'], 'safe'],
            [['title', 'image'], 'string', 'max' => 255],
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
            'image' => 'Картинка',
            'created_at' => 'Дата создания',
            'author' => 'Автор',
            'source' => 'Источник',
        ];
    }

    public function getImageUrl() {
        if ($this->image) {
            return Yii::$app->params['contentDomain'] . "/" . $this->image;
        }

        return null;
    }

    public function upload()
    {
        if ($this->validate() && $this->imageFile) {
            $filename = md5($this->id) . '.' . $this->imageFile->extension;
            $this->updateAttributes(['image' => $filename]);
            $filePath = Yii::getAlias('@content') . '/' . $filename;
            $this->imageFile->saveAs($filePath);
            return true;
        } else {
            return false;
        }
    }
}
