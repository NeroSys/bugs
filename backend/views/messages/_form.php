<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Pages;
use mihaildev\ckeditor\CKEditor;
use yii\jui\DatePicker;
use common\models\Courses;

/* @var $this yii\web\View */
/* @var $model common\models\Messages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="messages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'courses_id')->dropDownList(ArrayHelper::map(Courses::find()->asArray()->all(),'id', 'name'), ['prompt' => 'Выберите']) ?>

    <?= $form->field($model, 'message')->widget(CKEditor::className(), [
        'options' => [
            'row' => 2],
    ])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
