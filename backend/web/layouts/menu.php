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
                    <i class="fa fa-linkedin text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">Jazz</span>
                </a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content side-content-full">
                <ul class="nav-main">
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Магазин</span></li>

                    <li class="open">
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Управление</span></a>
                        <ul>
<!--Каталог -->
                            <li>
                                <a href="<?= Url::to(['/catalog/index'])?>">
                                    <i class="si si-book-open"></i>
                                    <span class="sidebar-mini-hide">Каталог товаров</span>
                                </a>
                            </li>
<!--Товары-->
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-earphones"></i><span class="sidebar-mini-hide">Товары</span></a>
                                <ul>
                                    <li>
                                        <a href="<?= Url::to(['/products/index'])?>">Список товаров</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/product-attr-list/index'])?>">Атрибуты товаров</a>
                                    </li>
                                    <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">С товаром покупают</span></a>
                                        <ul>
                                            <li>
                                                <a href="<?= Url::to(['/product-buy-with-group/index'])?>">Список групп</a>
                                            </li>
                                            <li>
                                                <a href="<?= Url::to(['/product-to-buy-with-group/index'])?>">Добавить товар</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Может понравиться</span></a>
                                        <ul>
                                            <li>
                                                <a href="<?= Url::to(['/product-like-group/index'])?>">Список групп</a>
                                            </li>
                                            <li>
                                                <a href="<?= Url::to(['/product-to-like-group/index'])?>">Добавить товар</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/rent/index'])?>">Аренда товаров</a>
                                    </li>
                                </ul>
                            </li>
<!--                            Products reviews messages -->
                            <li>
                                <a href="<?= Url::to(['/product-reviews/index']) ?>">
                                    <i class="si si-star"></i>
                                    <span class="sidebar-mini-hide">Отзывы и рейтинги</span>
                                </a>
                            </li>
<!--Фильтры товаров-->

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-magnifier"></i><span class="sidebar-mini-hide">Фильтры товаров</span></a>
                                <ul>
                                    <li>
                                        <a href="<?= Url::to(['/filter-group-list/index'])?>">Блок управления</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/filter-type-to-catalog/index'])?>">Фильтры категорий</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/product-attr-to-filter-type/index'])?>">Фильтры товаров</a>
                                    </li>
                                </ul>
                            </li>
<!--Акции и дисконты -->
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-directions"></i><span class="sidebar-mini-hide">Акции и дисконты</span></a>
                                <ul>
                                    <li>
                                        <a href="<?= Url::to(['/discount/index'])?>">Дисконты</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/actions/index'])?>">Акции</a>
                                    </li>
<!--                                    <li>-->
<!--                                        <a href="--><?//= Url::to(['/product-to-discount/index'])?><!--">Акционные товары</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="--><?//= Url::to(['/brand-to-discount/index'])?><!--">Акционные бренды</a>-->
<!--                                    </li>-->
                                </ul>
                            </li>

                            <li>
                                <a href="<?= Url::to(['/promo/index']) ?>">
                                    <i class="si si-tag"></i>
                                    <span class="sidebar-mini-hide">Промо-коды</span>
                                </a>
                            </li>
<!--Бренды-->
                            <li>
                                <a href="<?= Url::to(['/brands/index']) ?>">
                                    <i class="si si-diamond"></i>
                                    <span class="sidebar-mini-hide">Бренды</span>
                                </a>
                            </li>
<!-- Валюты -->
                            <li>
                                <a href="<?= Url::to(['/currency/index']) ?>">
                                    <i class="si si-wallet"></i>
                                    <span class="sidebar-mini-hide">Валюты сайта</span>
                                </a>
                            </li>
                        </ul>
                    </li>

<!--                    Messages -->

                    <li>
                        <a href="<?= Url::to(['/messages/index']) ?>">
                            <i class="si si-docs"></i>
                            <span class="sidebar-mini-hide">Сообщения</span>
                        </a>
                    </li>
                    <!--Заказы-->
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Заказы</span></a>
                        <ul>
                            <li>
                                <a href="<?= Url::to(['/orders/index'])?>">
                                    <i class="si si-basket-loaded"></i>
                                <span class="sidebar-mini-hide">Список заказов</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['/order-status-list/index'])?>">
                                    <i class="si si-call-out"></i>
                                    <span class="sidebar-mini-hide">Управление заказами</span>
                                </a>
                            </li>
                        </ul>
                    </li>

<!-- Дилеры-->
                    <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Наши дилеры</span></a>
                    <ul>
                        <li>
                            <a href="<?= Url::to(['/dillers/index']) ?>">
                                <i class="si si-doc"></i>
                                <span class="sidebar-mini-hide">Список дилеров</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/cities/index']) ?>">
                                <i class="si si-globe"></i>
                                <span class="sidebar-mini-hide">Города дилеров</span>
                            </a>
                        </li>
                    </ul>
                    </li>
<!-- Партнеры -->
                    <li>
                        <a href="<?= Url::to(['/partners/index']) ?>">
                            <i class="si si-list"></i>
                            <span class="sidebar-mini-hide">Партнеры</span>
                        </a>
                    </li>
<!-- Медиа блок-->
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Медиа</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Медиа блок</span></a>
                        <ul>
<!--Новости-->
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-info"></i><span class="sidebar-mini-hide">Новости</span></a>
                                <ul>
                                    <li>
                                        <a href="<?= Url::to(['/news-category/index'])?>">Разделы новостей</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/news/index'])?>">Новости</a>
                                    </li>
                                </ul>
                            </li>

<!--Баннера -->
                            <li>
                                <a href="<?= Url::to(['/banners/index'])?>">
                                    <i class="si si-layers"></i>
                                    <span class="sidebar-mini-hide">Баннера</span>
                                </a>
                            </li>
<!--                            Видео -->
                            <li>
                                <a href="<?= Url::to(['/video/index'])?>">
                                    <i class="si si-film"></i>
                                    <span class="sidebar-mini-hide">Видео</span>
                                </a>
                            </li>
<!--Вакансии -->
                            <li>
                                <a href="<?= Url::to(['/vacations/index'])?>">
                                    <i class="si si-like"></i>
                                    <span class="sidebar-mini-hide">Вакансии</span>
                                </a>
                            </li>


                        </ul>
                    </li>
<!--Пользователи-->
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Клиенты</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Пользователи</span></a>
                        <ul>
                            <li>
                                <a href="<?= Url::to(['/user/index'])?>">
                                    <i class="si si-users"></i>Список</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['/permit/access/permission'])?>">
                                    <i class="si si-user-following"></i>Управление доступом</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['/permit/access/role'])?>">
                                    <i class="si si-user-unfollow"></i>Управление ролями</a>
                            </li>
                        </ul>
                    </li>

<!--Страницы-->
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Страницы</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Сайт</span></a>
                        <ul>
<!--Верхнее меню -->
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-folder"></i><span class="sidebar-mini-hide">Верхнее меню</span></a>
                                <ul>
                                    <li>
                                        <a href="<?= Url::to(['/pages/payments-delivery']) ?>">Оплата и доставка</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/actions']) ?>">Акции %</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/contacts']) ?>">Контакты</a>
                                    </li>
                                </ul>
                            </li>
<!--Среднее меню -->
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-folder"></i><span class="sidebar-mini-hide">Среднее меню</span></a>
                                <ul>
                                    <li>
                                        <a href="<?= Url::to(['/pages/install']) ?>">Инсталляция</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/rent-full']) ?>">Аренда залов</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/rent-equipment']) ?>">Аренда обрудования</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/piano-rent']) ?>">Аренда фортепиано</a>
                                    </li>
                                </ul>
                            </li>
<!--Нижнее меню -->
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-folder"></i><span class="sidebar-mini-hide">Нижнее меню</span></a>
                                <ul>
                                    <li>
                                        <a href="<?= Url::to(['/pages/about']) ?>">О нас</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/about_products']) ?>">Все о товарах</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/discounts']) ?>">Дисконтная программа</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/services']) ?>">Сервисный центр</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/dillers']) ?>">Дилеры</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/partners']) ?>">Партнеры</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/news']) ?>">Новости</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/returnproduct']) ?>">Возврат товара</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/brands']) ?>">Бренды</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/pages/gifts']) ?>">Сертификаты</a>
                                    </li>

                                    <li>
                                        <a href="<?= Url::to(['/pages/credit']) ?>">Кредитование</a>
                                    </li>
                                </ul>
                            </li>
<!--Страницы без меню -->
                            <li>
                                <a href="<?= Url::to(['/pages/main']) ?>">
                                    <span class="sidebar-nav-mini-hide">Главная</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['/pages/error']) ?>">
                                    <span class="sidebar-nav-mini-hide">404</span>
                                </a>
                            </li>
                        </ul>
                    </li>
<!--Настройки сайта -->
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Настройки</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Параметры</span></a>
                        <ul>
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
                                <a href="<?= Url::to(['/statistics'])?>">
                                    <i class="si si-bar-chart"></i>
                                    <span class="sidebar-mini-hide">Статистика</span>
                               </a>
                           </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>