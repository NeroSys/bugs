<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Pages;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'small_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visible')->checkbox() ?>

    <?= $form->field($model, 'sort')->textInput() ?>
    
    <p>Translations</p>

    <?php foreach ($langs as $lang): ?>

        <p><?= $lang->name?></p>

        <?php
        if(!$model->isNewRecord) $transcription = Pages::getValue($model->id, $lang->id);
        ?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model,'langTitle1['.$lang->id.']['.$transcription->id .']')->label('')->textInput(['maxlength' => true, 'value' => $transcription['title_1']])?>
        <?} else {?>
            <?= $form->field($model,'langTitle1New['.$lang->id.'][]')->label('')->textInput(['maxlength' => true, 'value' => ''])?>
        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model, 'langText1['.$lang->id.']['.$transcription->id .']')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => $transcription['text_1']],
            ])->label(Yii::t('app','Основной текст'))?>

        <?} else {?>

            <?= $form->field($model, 'langText1New['.$lang->id.'][]')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => ''],
            ])->label(Yii::t('app','Основной текст'))?>

        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model,'langTitle2['.$lang->id.']['.$transcription->id .']')->label('')->textInput(['maxlength' => true, 'value' => $transcription['title_2']])?>
        <?} else {?>
            <?= $form->field($model,'langTitle2New['.$lang->id.'][]')->label('')->textInput(['maxlength' => true, 'value' => ''])?>
        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model, 'langText2['.$lang->id.']['.$transcription->id .']')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => $transcription['text_2']],
            ])->label(Yii::t('app','Текст 2' ))?>

        <?} else {?>

            <?= $form->field($model, 'langText2New['.$lang->id.'][]')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => ''],
            ])->label(Yii::t('app','Текст 2'))?>

        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model,'langTitle3['.$lang->id.']['.$transcription->id .']')->label('')->textInput(['maxlength' => true, 'value' => $transcription['title_3']])?>
        <?} else {?>
            <?= $form->field($model,'langTitle3New['.$lang->id.'][]')->label('')->textInput(['maxlength' => true, 'value' => ''])?>
        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model, 'langText3['.$lang->id.']['.$transcription->id .']')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => $transcription['text_3']],
            ])->label(Yii::t('app','Текст 3' ))?>

        <?} else {?>

            <?= $form->field($model, 'langText3New['.$lang->id.'][]')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => ''],
            ])->label(Yii::t('app','Текст 3'))?>

        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model,'langTitle4['.$lang->id.']['.$transcription->id .']')->label('')->textInput(['maxlength' => true, 'value' => $transcription['title_4']])?>
        <?} else {?>
            <?= $form->field($model,'langTitle4New['.$lang->id.'][]')->label('')->textInput(['maxlength' => true, 'value' => ''])?>
        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model, 'langText4['.$lang->id.']['.$transcription->id .']')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => $transcription['text_4']],
            ])->label(Yii::t('app','Текст 4' ))?>

        <?} else {?>

            <?= $form->field($model, 'langText4New['.$lang->id.'][]')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => ''],
            ])->label(Yii::t('app','Текст 4'))?>

        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model,'langTitle5['.$lang->id.']['.$transcription->id .']')->label('')->textInput(['maxlength' => true, 'value' => $transcription['title_5']])?>
        <?} else {?>
            <?= $form->field($model,'langTitle5New['.$lang->id.'][]')->label('')->textInput(['maxlength' => true, 'value' => ''])?>
        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model, 'langText5['.$lang->id.']['.$transcription->id .']')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => $transcription['text_5']],
            ])->label(Yii::t('app','Текст 5' ))?>

        <?} else {?>

            <?= $form->field($model, 'langText5New['.$lang->id.'][]')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => ''],
            ])->label(Yii::t('app','Текст 5'))?>

        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model,'langTitle6['.$lang->id.']['.$transcription->id .']')->textInput(['maxlength' => true, 'value' => $transcription['title_6']])?>
        <?} else {?>
            <?= $form->field($model,'langTitle6New['.$lang->id.'][]')->label('')->textInput(['maxlength' => true, 'value' => ''])?>
        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model, 'langText6['.$lang->id.']['.$transcription->id .']')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => $transcription['text_6']],
            ])->label(Yii::t('app','Текст 6' ))?>

        <?} else {?>

            <?= $form->field($model, 'langText6New['.$lang->id.'][]')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => ''],
            ])->label(Yii::t('app','Текст 6'))?>

        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model,'langTitle7['.$lang->id.']['.$transcription->id .']')->label('')->textInput(['maxlength' => true, 'value' => $transcription['title_7']])?>
        <?} else {?>
            <?= $form->field($model,'langTitle7New['.$lang->id.'][]')->label('')->textInput(['maxlength' => true, 'value' => ''])?>
        <?}?>

        <?if(!empty($transcription)){?>
            <?= $form->field($model, 'langText7['.$lang->id.']['.$transcription->id .']')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => $transcription['text_7']],
            ])->label(Yii::t('app','Текст 7' ))?>

        <?} else {?>

            <?= $form->field($model, 'langText7New['.$lang->id.'][]')->widget(CKEditor::className(), [
                'options' => [
                    'row' => 2,
                    'value' => ''],
            ])->label(Yii::t('app','Текст 7'))?>

        <?}?>

    <?php endforeach; ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Добавить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
