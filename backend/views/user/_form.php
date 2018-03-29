<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\components\cropper\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\User */
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
                        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'phone_1')->textInput() ?>

                        <?= $form->field($model, 'phone_2')->textInput() ?>

                        <?= $form->field($model, 'isNew')->checkbox() ?>

                        <?= $form->field($model, 'moder')->checkbox() ?>

                        <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'status')->textInput() ?>


                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="block">
                    <div class="block-content">
                        <?php echo $form->field($model, 'hostImage')->widget(Widget::className(), [
                            'uploadUrl' => Url::toRoute('user/uploadPhoto'),
                            'width' => 250,
                            'height' => 250
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

