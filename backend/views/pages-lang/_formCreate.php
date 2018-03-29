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
<?php if ($value->slug == 'services' or $value->slug == 'returnproduct'):  ?>

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

                                <?= $form->field($model, 'title_1')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Текст превью'))?>

                                <?= $form->field($model, 'text_2')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Основной текст'))?>

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

<!--    Страница все о товарах, контакты -->
<?php elseif ($value->slug == 'about_products' or $value->slug == 'contacts' ):?>

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
    <?}else{?>
        <h3>Переводы всех языковых версий данной позиции уже существуют. <a href="<?= Url::to(['/pages/'.$value->slug]) ?>">Вернуться</a> </h3>
    <?}?>

<!--    Инсталляция -->

<?php elseif ($value->slug == 'install'):?>

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

                                <?= $form->field($model, 'title_1')->textInput(['maxlength' => true])->label('Название страницы') ?>

                                <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Верхний текст'))?>

                                <?= $form->field($model, 'text_2')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Текст слева'))?>
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

    <!--Сертификаты -->

<?php elseif($value->slug == 'gifts'):?>

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

                                <?= $form->field($model, 'title_1')->textInput(['maxlength' => true])->label('Название страницы') ?>

                                <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Текст превью верхний'))?>

                                <?= $form->field($model, 'text_2')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Текст превью нижний'))?>

                                <?= $form->field($model, 'text_3')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Основной текст страницы'))?>


                                <?= $form->field($model, 'title_4')->textInput(['maxlength' => true])->label('Заголовок нижний на странице') ?>

                                <?= $form->field($model, 'text_4')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 12
                                    ],
                                ])->label(Yii::t('app','Нижний текст'))?>
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

    <!--Аренда фортпиано, аренда оборудования, аренда залов -->

<?php elseif($value->slug == 'piano-rent' or $value->slug == 'rent-full' or $value->slug == 'rent-equipment'):?>

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

                                <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Текст под изображением'))?>


                                <?= $form->field($model, 'title_1')->textInput(['maxlength' => true])->label('Перевод строки над телефоном') ?>

                                <?= $form->field($model, 'title_2')->textInput(['maxlength' => true])->label('Телефон или другие контактные данные') ?>

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

    <!--    BRANDS || PARTNERS -->

<?php elseif($value->slug == 'brands' or $value->slug == 'partners'):?>

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

                                <?= $form->field($model, 'title_1')->textInput(['maxlength' => true])->label('Название страницы') ?>

                                <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','основной текст'))?>

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

    <!-- Кредитование-->
<?php elseif($value->slug == 'credit'):?>

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

                                <?= $form->field($model, 'title_1')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app',''))?>


                                <?= $form->field($model, 'title_2')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'text_2')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app',''))?>


                                <?= $form->field($model, 'title_3')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'text_3')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app',''))?>


                                <?= $form->field($model, 'title_4')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'text_4')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app',''))?>


                                <?= $form->field($model, 'title_5')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'text_5')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app',''))?>

                                <?= $form->field($model, 'title_6')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'text_6')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app',''))?>


                                <?= $form->field($model, 'title_7')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'text_7')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app',''))?>

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

<!--    DISCOUNTS -->

    <?php elseif ($value->slug == 'discounts'): ?>

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

                                <?= $form->field($model, 'title_1')->textInput(['maxlength' => true])->label('Название страницы') ?>

                                <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Текст вверху над ползунком'))?>


                                <?= $form->field($model, 'title_2')->textInput(['maxlength' => true])->label('Инструкция на ползунок') ?>

                                <?= $form->field($model, 'title_3')->textInput(['maxlength' => true])->label('Результат по ползунку') ?>


                                <?= $form->field($model, 'title_5')->textInput(['maxlength' => true])->label('Title таблицы слева') ?>

                                <?= $form->field($model, 'title_6')->textInput(['maxlength' => true])->label('Title таблицы справа') ?>


                                <?= $form->field($model, 'title_4')->textInput(['maxlength' => true])->label('Нижний заголовок над текстом') ?>

                                <?= $form->field($model, 'text_4')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Текст внизу страницы'))?>

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
    <!--   акцииб главная страница -->


<?php elseif($value->slug == 'actions' or $value->slug == 'main'):?>

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
    <?}else{?>
        <h3>Переводы всех языковых версий данной позиции уже существуют. <a href="<?= Url::to(['/pages/'.$value->slug]) ?>">Вернуться</a> </h3>
    <?}?>

    <!-- Delivery and Payments -->
<?php elseif($value->slug == 'payments-delivery'):?>

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

                                <?= $form->field($model, 'title_1')->textInput(['maxlength' => true])->label('Название страницы') ?>

                                <?= $form->field($model, 'text_1')->widget(CKEditor::className(), [
                                    'options' => [
                                        'row' => 4
                                    ],
                                ])->label(Yii::t('app','Текст над таблицей'))?>


                                <?= $form->field($model, 'title_2')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'title_3')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'title_4')->textInput(['maxlength' => true]) ?>

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
    <?}else{?>
        <h3>Переводы всех языковых версий данной позиции уже существуют. <a href="<?= Url::to(['/pages/'.$value->slug]) ?>">Вернуться</a> </h3>
    <?}?>

<?php endif; ?>