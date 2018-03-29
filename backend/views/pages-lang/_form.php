<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use common\models\Pages;
use common\models\Lang;

/* @var $this yii\web\View */
/* @var $model common\models\PagesLang */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $value = Pages::find()->where(['id'=> $model->item_id])->one(); ?>
<?php $language = Lang::find()->where(['id' => $model->lang_id])->one(); ?>


<!--тех обслуживание  --- возврат товара -->
<?php if ($value->slug == 'contacts' ): ?>

    <?php $form = ActiveForm::begin(); ?>
    <!-- Product -->
    <div class="block">
        <div class="block-header bg-gray">
            <div class="row items-push">
                <div class="col-sm-4">
                    <h2 class="page-heading">
                        <i class="fa fa-pencil"></i><?= Yii::t('app', 'Язык : ')?><strong><?= $language->name ?></strong>
                    </h2>
                </div>
                <div class="col-sm-8 text-right hidden-xs">
                    <h1 class="page-heading">
                        <?= Yii::t('app', 'Контент страницы :'). $value->name; ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="row items-push">

                <div class="col-md-12">
                    <div class="block">
                        <div class="block-content">
                            <?= $form->field($model, 'title_1')->textInput(['maxlength' => true])->label('Название страницы') ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END Product -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Сохранить обновления'), ['class' => $model->isNewRecord ? 'btn btn-block btn-warning push-10' : 'btn btn-block btn-primary push-10']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <!--404  -->
<?php elseif ($value->slug == 'error'):  ?>

    <?php $form = ActiveForm::begin(); ?>
    <!-- Product -->
    <div class="block">
        <div class="block-header bg-gray">
            <div class="row items-push">
                <div class="col-sm-4">
                    <h2 class="page-heading">
                        <i class="fa fa-pencil"></i><?= Yii::t('app', 'Язык : ')?><strong><?= $language->name ?></strong>
                    </h2>
                </div>
                <div class="col-sm-8 text-right hidden-xs">
                    <h1 class="page-heading">
                        <?= Yii::t('app', 'Контент страницы :'). $value->name; ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="row items-push">

                <div class="col-md-12">
                    <div class="block">
                        <div class="block-content">
                            <?= $form->field($model, 'title_1')->textInput(['maxlength' => true])->label('Перевод верхнего сообщения') ?>

                            <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
                                'options' => [
                                    'row' => 4
                                ],
                            ])->label(Yii::t('app','2-й абзац сообщения'))?>

                            <?= $form->field($model, 'text_2')->widget(CKEditor::className(), [
                                'options' => [
                                    'row' => 4
                                ],
                            ])->label(Yii::t('app','3-й абзац сообщения'))?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END Product -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Сохранить обновления'), ['class' => $model->isNewRecord ? 'btn btn-block btn-warning push-10' : 'btn btn-block btn-primary push-10']) ?>
    </div>

    <?php ActiveForm::end(); ?>



    <!--главная страница  -->
<?php elseif ($value->slug == 'main'):  ?>


    <?php $form = ActiveForm::begin(); ?>
    <!-- Product -->
    <div class="block">
        <div class="block-header bg-gray">
            <div class="row items-push">
                <div class="col-sm-4">
                    <h2 class="page-heading">
                        <i class="fa fa-pencil"></i><?= Yii::t('app', 'Язык : ')?><strong><?= $language->name ?></strong>
                    </h2>
                </div>
                <div class="col-sm-8 text-right hidden-xs">
                    <h1 class="page-heading">
                        <?= Yii::t('app', 'Контент страницы :'). $value->name; ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="row items-push">

                <div class="col-md-12">
                    <div class="block">
                        <div class="block-content">
                            <?= $form->field($model, 'title_1')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END Product -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Сохранить обновления'), ['class' => $model->isNewRecord ? 'btn btn-block btn-warning push-10' : 'btn btn-block btn-primary push-10']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php endif; ?>