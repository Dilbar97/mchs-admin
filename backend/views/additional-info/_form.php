<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Categories;

/* @var $this yii\web\View */
/* @var $model common\models\AdditionalInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="additional-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Categories::find()->where(['is_active' => true])->all(), 'id', 'title')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
