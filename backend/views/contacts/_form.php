<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Contacts;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Contacts */
/* @var $form yii\widgets\ActiveForm */
Yii::$app->language = 'ru-RU';
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<!-- Product -->

<div class="block">
    <div class="block-content">
        <div class="row items-push">
            <div class="col-xs-12">
                <!-- Extra Info -->
                <div class="block">
                    <div class="block-header bg-gray">
                        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                            <li class="active">
                                <a href="#ecom-product-info">Основная информация</a>
                            </li>
                            <li>
                                <a href="#ecom-product-comments">Переводы контента</a>
                            </li>
                        </ul>
                    </div>

                    <div class="block-content tab-content">
                        <div class="tab-pane pull-r-l active" id="ecom-product-info">

                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                            <?php if (!$model->isNewRecord){?>
                                <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                            <?}?>

                            <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'phone_1')->textInput() ?>

                            <?= $form->field($model, 'phone_2')->textInput() ?>

                            <?= $form->field($model, 'sort')->textInput() ?>

                        </div>

                        <div class="tab-pane pull-r-l" id="ecom-product-comments">

                            <div class="block">
                                <div class="block-header bg-gray">
                                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                                        <?php foreach ($langs as $lang): ?>

                                            <li class=" <?php if ($lang->local == 'ru') echo 'active';?>">
                                                <a href="#<?= $lang->id ?>"><?= $lang->name ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>


                                <div class="block-content tab-content">
                                    <?php foreach ($langs as $lang): ?>
                                        <div class="tab-pane pull-r-l <?php if ($lang->local == 'ru') echo 'active';?>" id="<?= $lang->id ?>">

                                            <?php
                                            if(!$model->isNewRecord) $transcription = Contacts::getValue($model->id, $lang->id);
                                            ?>

                                            <?if(!empty($transcription)){?>
                                                <?= $form->field($model,'title['.$lang->id.']['.$transcription->id .']')->label('Название')->textInput(['maxlength' => true, 'value' => $transcription['name']])?>
                                            <?} else {?>
                                                <?= $form->field($model,'titleNew['.$lang->id.'][]')->label('Название')->textInput(['maxlength' => true, 'value' => ''])?>
                                            <?}?>

                                            <?if(!empty($transcription)){?>
                                                <?= $form->field($model, 'address['.$lang->id.']['.$transcription->id .']')->widget(CKEditor::className(), [
                                                    'options' => [
                                                        'row' => 2,
                                                        'value' => $transcription['address']],
                                                ])?>

                                            <?} else {?>

                                                <?= $form->field($model, 'addressNew['.$lang->id.'][]')->widget(CKEditor::className(), [
                                                    'options' => [
                                                        'row' => 2,
                                                        'value' => '',]
                                                ])?>

                                            <?}?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END Extra Info -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Product -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить позцию') : Yii::t('app', 'Сохранить обновления'), ['class' => $model->isNewRecord ? 'btn btn-block btn-warning push-10' : 'btn btn-block btn-primary push-10']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
