<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AdditionalInfo */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Дополнительно', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="additional-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'category_id',
                'value' => function ($data) {
                    return $data->category->title;
                }
            ],
            'created_at',
        ],
    ]) ?>

</div>
