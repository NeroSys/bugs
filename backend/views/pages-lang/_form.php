<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\PagesLang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-lang-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php if ($model->isNewRecord) {?>

        <?= $form->field($model, 'lang_id')->dropDownList($model->getArray($item_id)) ?>

    <?}?>

    <?= $form->field($model, 'title_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
        'options' => [
            'row' => 2,
            ],
    ])?>

    <?= $form->field($model, 'title_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_2')->widget(CKEditor::className(), [
        'options' => [
            'row' => 2,
            ],
    ])?>

    <?= $form->field($model, 'title_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_3')->widget(CKEditor::className(), [
        'options' => [
            'row' => 2,
          ],
    ])?>

    <?= $form->field($model, 'title_4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_4')->widget(CKEditor::className(), [
        'options' => [
            'row' => 2,
            ],
    ])?>

    <?= $form->field($model, 'title_5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_5')->widget(CKEditor::className(), [
        'options' => [
            'row' => 2,
            ],
    ])?>

    <?= $form->field($model, 'title_6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_6')->widget(CKEditor::className(), [
        'options' => [
            'row' => 2,
            ],
    ])?>

    <?= $form->field($model, 'title_7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_7')->widget(CKEditor::className(), [
        'options' => [
            'row' => 2,
            ],
    ])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
