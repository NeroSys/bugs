<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Pages;
use common\models\Contacts;
?>
<?php $contacts = Contacts::find()->all(); ?>
<?php $page = Pages::find()->where(['slug' => 'error'])->one() ?>
<?php if (!empty($page)) $lang_page = $page->getDataItems() ?>
<?php $this->title = $lang_page['title_1'] ?>
<!--<div class="site-error">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <div class="alert alert-danger">-->
<!--        --><?//= nl2br(Html::encode($message)) ?>
<!--    </div>-->
<!---->
<!--    <p>-->
<!--        The above error occurred while the Web server was processing your request.-->
<!--    </p>-->
<!--    <p>-->
<!--       11111-->
<!--    </p>-->
<!---->
<!--</div>-->

<div class="wrapper">
    <div class="aside-header" id="nav-link-list">
        <a href="<?= Url::to(['site/index']) ?>">
            <div class="text-header-sector"><span><?= $lang_page['title_2'] ?></span></div>
            <div class="dot-header-sector">
                <span class="expanding-circle"></span>
                <span class="ie-fix-block"></span>
            </div>
        </a>
    </div>
    <div class="section section-404">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="block-404">
                        <div class="starting-zorin-404">BUG-IT</div>
                        <div class="col-lg-6">

                            <h1><?= $lang_page['text_1'] ?></h1>
                            <br/>

                            <div class="footer">
                                <div class="footer-content">
                                    <div class="footer-row">
                                        <div class="footer-block">
                                            <ul class="footer-contacts">
                                                <?php if (!empty($contacts)) {?>
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
                                                <span>404</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="col-lg-6">
                                <img src="/frontend/web/images/11.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
