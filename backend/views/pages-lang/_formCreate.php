<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Lang;
use mihaildev\ckeditor\CKEditor;
use common\models\Pages;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\PagesLang */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $value = Pages::find()->where(['id' => $model->item_id])->one() ?>

    <!--тех обслуживание  --- возврат товара -->
<?php if ($value->slug == 'main'):  ?>

    <?php $item = $model->getArray($item_id); if (!empty($item)){?>

        <?php $form = ActiveForm::begin(); ?>
        <!-- Product -->
        <div class="block">
            <div class="block-header bg-gray">
                <div class="row items-push">
                    <div class="col-sm-4">
                        <h2 class="page-heading">
                            <?= Html::encode($this->title) ?>
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

                                <?= $form->field($model, 'lang_id')->dropDownList($model->getArray($item_id)) ?>

                                <?= $form->field($model, 'title_1')->textInput(['maxlength' => true])->label('Название') ?>

                                <?= $form->field($model, 'title_2')->textInput(['maxlength' => true])->label('Девиз на слайдере') ?>

                                <?= $form->field($model, 'title_3')->textInput(['maxlength' => true])->label('О нас') ?>

                                <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Текст о нас'))?>

                                <?= $form->field($model, 'title_4')->textInput(['maxlength' => true])->label('Курсы') ?>
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
    <?}else{?>
        <h3>Переводы всех языковых версий данной позиции уже существуют. <a href="<?= Url::to(['/pages/'.$value->slug]) ?>">Вернуться</a> </h3>
    <?}?>

    <!-- 404 -->
<?php elseif($value->slug == 'error'):?>

    <?php $item = $model->getArray($item_id); if (!empty($item)){?>

        <?php $form = ActiveForm::begin(); ?>
    <!-- Product -->
        <div class="block">
        <div class="block-header bg-gray">
            <div class="row items-push">
                <div class="col-sm-4">
                    <h2 class="page-heading">
                        <?= Html::encode($this->title) ?>
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

                            <?= $form->field($model, 'lang_id')->dropDownList($model->getArray($item_id)) ?>

                            <?= $form->field($model, 'title_1')->textInput(['maxlength' => true])->label('Название') ?>

                            <?= $form->field($model, 'title_1')->textInput(['maxlength' => true])->label('Ссылка на главную') ?>

                            <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
                                'options' => [
                                    'row' => 4
                                ],
                            ])->label(Yii::t('app','Сообщение'))?>


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
    <?}else{?>
        <h3>Переводы всех языковых версий данной позиции уже существуют. <a href="<?= Url::to(['/pages/'.$value->slug]) ?>">Вернуться</a> </h3>
    <?}?>

<?php endif; ?>