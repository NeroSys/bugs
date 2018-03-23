<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Opengraf */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
            <!-- Product -->
            <div class="block">
                <div class="block-content">
                    <div class="row items-push">
                        <div class="col-xs-12">
                            <!-- Extra Info -->
                            <div class="block">
                                <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                                    <li class="active">
                                        <a href="#ecom-product-info">Основная информация</a>
                                    </li>
                                    <li>
                                        <a href="#ecom-product-comments">Title</a>
                                    </li>
                                    <li>
                                        <a href="#ecom-product-reviews">Keywords</a>
                                    </li>
                                    <li>
                                        <a href="#ecom-product-seo">Description</a>
                                    </li>
                                </ul>
                                <div class="block-content tab-content">
                                    <div class="tab-pane pull-r-l active" id="ecom-product-info">

                                        <div class="col-lg-6">
                                            <!-- Basic Form Elements Content -->
                                            <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

                                            <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

                                            <?php if($model->isNewRecord): ?>

                                                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

                                            <?php else:?>

                                                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

                                            <?php endif; ?>

                                            <?= $form->field($model, 'GAuthor')->textInput(['maxlength' => true]) ?>

                                            <?= $form->field($model, 'GPublisher')->textInput(['maxlength' => true]) ?>
                                        </div>

                                        <div class="col-lg-6">
                                            <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

                                            <?= $form->field($model, 'audio')->textInput(['maxlength' => true]) ?>

                                            <?= $form->field($model, 'localeAlternative')->textInput(['maxlength' => true]) ?>

                                            <?= $form->field($model, 'app_id')->textInput() ?>
                                            <!-- END Basic Form Elements Content -->
                                        </div>

                                    </div>

                                    <div class="tab-pane pull-r-l" id="ecom-product-comments">

                                        <?php foreach ($langs as $lang): ?>

                                            <p><?= $lang->name?></p>
                                            <?php
                                            if(!$model->isNewRecord) $transcription = $model::getValue($model->id, $lang->id);
                                            ?>

                                            <?if(!empty($transcription)){?>
                                                <?= $form->field($model,'title['.$lang->id.']['.$transcription->id .']')->label('')->textInput(['maxlength' => true, 'value' => $transcription['title']])?>
                                            <?} else {?>
                                                <?= $form->field($model,'titleNew['.$lang->id.'][]')->label('')->textInput(['maxlength' => true, 'value' => ''])?>
                                            <?}?>

                                        <?php endforeach; ?>


                                    </div>

                                    <div class="tab-pane pull-r-l" id="ecom-product-reviews">

                                        <?php foreach ($langs as $langK): ?>

                                            <p><?= $langK->name?></p>
                                            <?php
                                            if(!$model->isNewRecord) $transcription = $model::getValue($model->id, $langK->id);
                                            ?>
                                            <?if(!empty($transcription)){?>
                                                <?= $form->field($model,'keywords['.$langK->id.']['.$transcription->id .']')->label('')->textarea(['rows' => 4, 'cols' => 5, 'value' => $transcription['keywords']])?>
                                            <?} else {?>
                                                <?= $form->field($model,'keywordsNew['.$langK->id.'][]')->label('')->textarea(['rows' => 4, 'cols' => 5, 'value' => ''])?>
                                            <?}?>

                                        <?php endforeach; ?>
                                    </div>

                                    <div class="tab-pane pull-r-l" id="ecom-product-seo">

                                        <div class="block">
                                            <div class="block-header bg-gray">
                                                <h3>Задать переводы описания</h3>
                                            </div>

                                            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                                                <?php foreach ($langs as $langD): ?>

                                                    <li class=" <?php if ($langD->local == 'ru-RU') echo 'active';?>">
                                                        <a href="#<?= $langD->id ?>"><?= $langD->name ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <div class="block-content tab-content">
                                                <?php foreach ($langs as $langD): ?>
                                                    <div class="tab-pane pull-r-l <?php if ($langD->local == 'ru-RU') echo 'active';?>" id="<?= $langD->id ?>">

                                                        <?php
                                                        if(!$model->isNewRecord) $transcription = $model::getValue($model->id, $langD->id);
                                                        ?>
                                                        <?if(!empty($transcription)){?>

                                                        <?= $form->field($model, 'description['.$langD->id.']['.$transcription->id .']')->widget(CKEditor::className(), [
                                                            'options' => [
                                                                'row' => 4,
                                                                'value' => $transcription['description']],
                                                        ])?>

                                                        <?} else {?>
                                                        <?= $form->field($model, 'descriptionNew['.$langD->id.'][]')->widget(CKEditor::className(), [
                                                            'options' => [
                                                                'row' => 4,
                                                                'value' => ''],
                                                        ])->label('')?>
                                                        <?}?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
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
    <?= Html::submitButton(Yii::t('app', 'Добавить тэги для OG:Facebook, Google+, Twitter'), ['class' => 'btn btn-block btn-primary push-20']) ?>
</div>
<?php ActiveForm::end(); ?>
<!-- END Side Content and Product -->