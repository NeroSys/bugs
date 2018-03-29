<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PagesLangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-lang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'item_id') ?>

    <?= $form->field($model, 'lang_id') ?>

    <?= $form->field($model, 'lang') ?>

    <?= $form->field($model, 'title_1') ?>

    <?php // echo $form->field($model, 'text_1') ?>

    <?php // echo $form->field($model, 'title_2') ?>

    <?php // echo $form->field($model, 'text_2') ?>

    <?php // echo $form->field($model, 'title_3') ?>

    <?php // echo $form->field($model, 'text_3') ?>

    <?php // echo $form->field($model, 'title_4') ?>

    <?php // echo $form->field($model, 'text_4') ?>

    <?php // echo $form->field($model, 'title_5') ?>

    <?php // echo $form->field($model, 'text_5') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
