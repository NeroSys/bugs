<?php

use frontend\components\FBFWidget;

$this->title = 'Курсы программирования';
?>
<?//= FBFWidget::widget([]) ?>
<div class="wrapper">
    <div class="aside-header" id="nav-link-list">
        <a class="hash active" href="#first">
            <div class="text-header-sector"><span><?= Yii::t('front', 'Главная') ?></span></div>
            <div class="dot-header-sector">
                <span class="expanding-circle"></span>
                <span class="ie-fix-block"></span>
            </div>
        </a>
        <a class="hash" href="#second">
            <div class="text-header-sector"><span><?= Yii::t('front', 'О нас') ?></span></div>
            <div class="dot-header-sector">
                <span class="expanding-circle"></span>
                <span class="ie-fix-block"></span>
            </div>
        </a>
        <a class="hash" href="#third">
            <div class="text-header-sector"><span><?= Yii::t('front', 'Курсы') ?></span></div>
            <div class="dot-header-sector">
                <span class="expanding-circle"></span>
                <span class="ie-fix-block"></span>
            </div>
        </a>
        <a class="hash" href="#forth">
            <div class="text-header-sector"><span><?= Yii::t('front', 'Контакты') ?></span></div>
            <div class="dot-header-sector">
                <span class="expanding-circle"></span>
                <span class="ie-fix-block"></span>
            </div>
        </a>
    </div>
    <div class="section main-slider-section" data-section="first">
        <div class="main-slider">
            <div class="swiper-wrapper">
                <?php if (!empty($sliders)) {?>
                    <?php foreach ($sliders as $slider){?>
                        <div class="swiper-slide"><img src="<?= $slider->getImage() ?>" alt="<?= $slider->name ?>"></div>
                    <?}?>
                <?}?>
            </div>
        </div>
        <div class="main-slider-mask">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h1 class="main-slider-logo">BUG - IT</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="slider-description">
                            <h2><?= Yii::t('front', 'Научиться программировать') ?></h2>
                            <span></span>
                            <a href="#" data-toggle = "modal" data-target = "#myModal"><?= Yii::t('front', 'ДА') ?></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="section about-section" data-section="second">
        <div class="pre-line"></div>
        <div class="container section-content">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="text-sector">
                        <div class="h-type-a">
                            <h3>О нас</h3>
                        </div>
                        <p>Мне повезло заниматься тем, что нравится, тем, что вдохновляет достигать новых успехов, когда не хочется спать, есть, пить, а только лишь двигаться вперед.
                            Сделать людей добрее - основная цель и миссия.
                            Для меня ведение мероприятия - это не просто разговор в микрофон - это эмоция, драйв, удовольствие, содержание.</p>
                        <a href="#" class="section-link-btn">Подробнее</a>
                    </div>
                    <div class="img-sector">
                        <img src="/frontend/web/images/about-1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="sliding-img">
            <img src="/frontend/web/images/about-2.png" alt="">
        </div>
        <div class="about-logo">
            <img src="/frontend/web/images/zorin.svg" alt="">
        </div>
    </div>
    <div class="section news-section" data-section="third">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-heading">
                        <h3>Курсы</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="video-bg">
                <div class="video-holder">
                    <img src="/frontend/web/images/333.png">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php if (!empty($courses)) {?>
                        <?php foreach ($courses as $cours){?>
                            <?php if (!empty($cours)) $lang_course = $cours->getDataitems() ?>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <div class="news-block">
                                    <div class="news-img-sector">
                                        <img src="<?php if (!empty($cours->small_img)) echo $cours->getPreviewImg() ?>" alt="<?= $lang_course['name']?>">
                                        <div class="triangle"></div>
                                    </div>
                                    <div class="news-text-sector">
                                        <div class="news-heading">
                                            <h4><?php if (!empty($lang_course['name'])) echo $lang_course->name ?></h4>
                                        </div>
                                        <div class="news-text">
                                            <p><?php if (!empty($lang_course['description'])) echo $lang_course->description ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?}?>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
    <div class="section contacts-section"  data-section="forth">
        <div class="video-bg">
            <div class="video-holder">
                <img src="/frontend/web/images/Kodvards2.jpg" alt="">
<!--                <video src="/frontend/web/images/bg-video.mp4" autoplay loop></video>-->
<!--                <div class="video-mask"></div>-->
            </div>
        </div>
        <div class="container">
            <div class="row contacts-img-row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-ms-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                    <img src="/frontend/web/images/it-language.jpg" alt="">
                </div>
            </div>
            <div class="row contacts-row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <div class="circle">
                        <div class="dot">
                            <div class="afterline"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <div class="section-heading">
                        <h3><?= Yii::t('front', 'Контакты')?></h3>
                    </div>
                </div>
            </div>
            <?php if (!empty($contacts)) {?>

            <div class="row">
                <?php foreach ($contacts as $contact){?>
                    <?php $lang_contact = $contact->getDataItems() ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact-block">

                        <div class="contact-phone"><h1><strong><?= $contact->phone_1 ?></strong></h1></div>
                        <div class="contact-phone"><h1><strong><?= $contact->phone_2 ?></strong></h1></div>
                        <div class="contact-e-mail"><h1><strong><?= $contact->mail ?></strong></h1></div>

                    </div>
                    <div class="contact-block">
                        <ul class="contact-links">
<!--                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>-->
                        </ul>
                    </div>
                    <div class="contact-block">

                            <div class="circle">
                                <div class="dot"></div>
                            </div>
                            <h2><?= $lang_contact['address'] ?></h2>


                            <div class="circle">
                                <div class="dot"></div>
                            </div>
                            <h2><?= $lang_contact['name'] ?></h2>
                    </div>
                </div>
                <?}?>
            </div>
            <?}?>
        </div>
    </div>
    <!--<div class="instagram-section">-->
    <!--<iframe src='/inwidget/index.php?width=800&inline=7&view=14&toolbar=false' scrolling='no' frameborder='no' style='border:none;width:800px;height:295px;overflow:hidden;'></iframe>-->
    <!--</div>-->
    <!--Modal section-->

    <div class="background-mask"></div>
</div>

