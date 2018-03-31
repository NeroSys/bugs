<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Courses;

$this->title = Yii::t('front', 'Напишите нам');
?>
<div class="wrapper">
    <div class="aside-header" id="nav-link-list">
        <a href="<?= Url::to(['site/index']) ?>">
            <div class="text-header-sector"><span><?= Yii::t('front', 'Главная') ?></span></div>
            <div class="dot-header-sector">
                <span class="expanding-circle"></span>
                <span class="ie-fix-block"></span>
            </div>
        </a>
    </div>
    <div class="section section-about-me">
        <div class="container section-content">
            <div class="row section-about-me-top-sector">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-md-push-5 col-lg-push-5">
                    <div class="section-heading">
                        <h1><?= Yii::t('front', 'Записаться') ?></h1>
                    </div>
                    <div class="about-me-text-block">
                        <div class="messages-form">
                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label(Yii::t('front', 'Имя')) ?>

                            <?= $form->field($model, 'mail')->textInput(['maxlength' => true])->label('E-mail') ?>

                            <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label(Yii::t('front', 'Телефон')) ?>

                            <?= $form->field($model, 'courses_id')
                                ->dropDownList(ArrayHelper::map(Courses::find()->asArray()->all(),'id', 'name'), ['prompt' => 'Выберите'])
                                ->label(Yii::t('front', 'На какой курс?')) ?>

                            <?= $form->field($model, 'message')->textarea(['rows' => 6])->label(Yii::t('front', 'Ваше сообщение')) ?>

                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('front', 'Хочу записаться на курсы'), ['class' => 'btn btn-primary']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>


                        <div class="about-me-zorin">BUG-IT</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-md-pull-7 col-lg-pull-7">
                    <img src="/frontend/web/images/robot.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="about-me-bottom-bg">
        <img src="/frontend/web/images/1.jpg" alt="">
    </div>
    <div class="footer">
        <div class="footer-content">
            <div class="footer-row">
                <div class="footer-block">
                    <ul class="footer-contacts">
                        <?php if (!empty($contacts)){?>
                            <?php foreach ($contacts as $contact){?>
                                <li><span><?= $contact->phone_1 ?></span></li>
                                <li><span><?= $contact->phone_2 ?></span></li>
                                <li><span><?= $contact->mail ?></span></li>
                            <?}?>
                        <?}?>
                    </ul>
                </div>
                <div class="footer-block footer-block-middle">
                    <div class="footer-heading">
                        <div class="footer-circle-box">
                            <div class="footer-heading-circle">
                                <div class="footer-heading-dot"></div>
                                <div class="footer-heading-line"></div>
                            </div>
                        </div>
                        <span><?= Yii::t('front', 'Контакты') ?></span>
                    </div>
                </div>

            </div>
            <div class="footer-row">
                <div class="development"><span>Developed by </span><a href="">NeRo systems</a></div>
            </div>
        </div>
    </div>
</div>