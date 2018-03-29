<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\components\cropper\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\Lang */
/* @var $form yii\widgets\ActiveForm */
Yii::$app->language = 'ru-RU';
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<!-- Product -->
<div class="block">
    <div class="block-content">
        <div class="row items-push">

            <div class="col-md-4">
                <div class="block">
                    <div class="block-content">
                        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'local')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'default')->checkbox() ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="block">
                    <div class="block-content">
                        <?php echo $form->field($model, 'hostImage')->widget(Widget::className(), [
                            'uploadUrl' => Url::toRoute('lang/uploadPhoto'),
                            'width' => 32,
                            'height' => 32
                        ])->label('') ?>
                    </div>
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


