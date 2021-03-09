<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdditionalInfo */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Дополнительно', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="additional-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
