<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 2/26/18
 * Time: 7:01 PM
 */
use yii\helpers\Url;
?>


<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op">
                <a class="h5 text-white" href="<?= Url::home() ?>">
                    <span class="h4 font-w600 sidebar-mini-hide">Bug-IT</span>
                </a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content side-content-full">
                <ul class="nav-main">

                    <li>
                        <a href="<?= Url::to(['/courses/index']) ?>">
                            <i class="si si-eyeglasses"></i>
                            <span class="sidebar-mini-hide">Курсы</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/sliders/index']) ?>">
                            <i class="si si-film"></i>
                            <span class="sidebar-mini-hide">Слайдер</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/messages/index']) ?>">
                            <i class="si si-docs"></i>
                            <span class="sidebar-mini-hide">Сообщения</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/contacts/index']) ?>">
                            <i class="si si-phone"></i>
                            <span class="sidebar-mini-hide">Контакты</span>
                        </a>
                    </li>
                    <li class="open">
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Страницы</span></a>
                        <ul>
                            <li>
                                <a href="<?= Url::to(['/pages/main']) ?>">
                                    <span class="sidebar-nav-mini-hide">Главная</span>
                                </a>
                            </li>
<!--                            <li>-->
<!--                                <a href="--><?//= Url::to(['/pages/contacts']) ?><!--">-->
<!--                                    <span class="sidebar-nav-mini-hide">Контакты</span>-->
<!--                                </a>-->
<!--                            </li>-->
                            <li>
                                <a href="<?= Url::to(['/pages/error']) ?>">
                                    <span class="sidebar-nav-mini-hide">404</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Мультиязычность</span></a>
                        <ul>

                            <li>

                            <li>
                                <a href="<?= Url::to(['/lang/index'])?>">Языки сайта</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['/translations'])?>">Переводы интерфейса</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/user/index']) ?>">
                            <i class="si si-user"></i>
                            <span class="sidebar-mini-hide">Пользователи</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>