<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 2/27/18
 * Time: 12:21 AM
 */

use yii\helpers\Url;
use yii\helpers\Html;

Yii::$app->language = 'ru-RU';

$this->title = 'Поиск по: '.$q;
?>



<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Результаты поиска по запросу: <small><?= $q ?></small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a class="link-effect" href="<?= Url::home() ?>">Главная страница</a></li>
                    <li>Результаты поиска</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->


    <!-- Page Content -->
    <div class="content">
        <div class="block">
            <ul class="nav nav-tabs" data-toggle="tabs">
                <li class="active">
                    <a href="#search-products">Товары</a>
                </li>
                <li>
                    <a href="#search-orders">Заказы</a>
                </li>
                <li>
                    <a href="#search-actions">Акции</a>
                </li>
                <li>
                    <a href="#search-news">Новости</a>
                </li>
            </ul>
            <div class="block-content tab-content bg-white">
                <!-- Projects -->
                <div class="tab-pane fade fade-up in active" id="search-products">
                    <div class="border-b push-30">

                        <h2 class="push-10"><?php if (!empty($products)) { $count = count($products); echo $count;}else{ echo '0';} ?> <span class="h5 font-w400 text-muted">товаров найдено</span></h2>
                    </div>
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th><i class="fa fa-suitcase text-gray"></i> Артикул/Название</th>
                            <th class="text-center hidden-xs" style="width: 15%;"><i class="fa fa-ticket text-gray"></i> Бренд</th>
                            <th class="text-center hidden-xs" style="width: 15%;"><i class="fa fa-ticket text-gray"></i> Гарантия</th>
                            <th class="text-center hidden-xs" style="width: 15%;"><i class="fa fa-ticket text-gray"></i> Цена</th>
                            <th class="text-center hidden-xs hidden-sm" style="width: 15%;"><i class="fa fa-bar-chart text-gray"></i> Старая цена</th>
                            <th class="text-right" style="width: 15%; min-width: 110px;"><i class="fa fa-trophy text-gray"></i> Склад</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($products)){?>
                            <?php foreach ($products as $product):?>
                        <tr>
                            <td>
                                <h3 class="h5 font-w600 push-10">
                                    <a class="link-effect" href="javascript:void(0)"><?= $product->art_id ?></a>
                                </h3>
                                <div class="font-s13 text-muted hidden-xs">
                                    <a href="<?= Url::to(['products/view', 'id' => $product->art_id]) ?>"><?= $product->name ?></a>
                                </div>
                            </td>
                            <td class="p text-center hidden-xs">
                                <?php if (!empty($product->brand_id)){?>
                                    <a href="<?= Url::to(['brands/view', 'id' => $product->brand_id])?>"><?= $product->brand->name?></a>
                                <?}?>
                            </td>
                            <td class="p text-center hidden-xs">
                                <?php if ($product->warranty) {?>
                                    <button class="btn btn-xs btn-success" type="button" data-toggle="tooltip" title="На гарантии">
                                        Да</button>
                                <?}else{?>
                                    <p>--</p>
                                <?}?>
                            </td>
                            <td class="h3 text-center hidden-xs hidden-sm"><?= $product->price ?></td>
                            <td class="h3 text-primary text-right"><?= $product->price_old ?></td>
                            <td class="h3 text-primary text-right"><?= $product->stock ?></td>
                        </tr>
                            <?php endforeach; ?>
                        <?}?>
                        </tbody>
                    </table>
                </div>
                <!-- END Projects -->

                <!-- Users -->
                <div class="tab-pane fade fade-up" id="search-orders">
                    <div class="border-b push-30">
                        <h2 class="push-10"><?php if (!empty($orders)) { $count = count($orders); echo $count;}else{ echo '0';} ?>
                            <span class="h5 font-w400 text-muted">заказов найдено</span>
                        </h2>
                    </div>
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;"><i class="si si-basket-loaded"></i>№ заказа</th>
                            <th>Покупатель</th>
                            <th class="hidden-xs" style="width: 30%;">Email</th>
                            <th class="text-center" style="width: 80px;">Сумма заказа</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($orders)){ ?>
                            <?php foreach ($orders as $order):?>
                        <tr>
                            <td class="text-center">
                                <a href="<?= Url::to(['orders/view', 'id' => $order->order_id]) ?>"><?= $order->order_id ?></a>
                            </td>
                            <td class="font-w600">
                                <a href="<?= Url::to(['user/view', 'id' => $order->user_site_id])?>">
                                    <?= $user = $order->user->username ?>
                                </a>
                            </td>
                            <td class="hidden-xs"><?= $user = $order->user->email ?></td>
                            <td class="hidden-xs">
                                <a href="<?= Url::to(['orders/view', 'id' => $order->order_id]) ?>">
                                    <?= $user = $order->order->sum ?>
                                </a>
                            </td>
                        </tr>
                            <?php endforeach; ?>
                        <?}?>
                        </tbody>
                    </table>
                </div>
                <!-- END Users -->

                <!-- Classic -->
                <div class="tab-pane fade fade-up" id="search-actions">
                    <div class="border-b push-30">
                        <h2 class="push-10"><?php if (!empty($actions)){ echo count($actions); }else{ echo 0;};  ?>  <span class="h5 font-w400 text-muted">акций найдено</span></h2>
                    </div>
                    <div class="row items-push">
                        <?php if (!empty($actions)) {?>
                            <?php foreach ($actions as $action): ?>
                            <?php $lang_action = $action->getDataItems(); ?>

                        <div class="col-md-12">
                            <h3 class="h5 font-w600">
                                <a class="link-effect" href="javascript:void(0)"><?= $action->name ?></a>
                            </h3>
                            <div class="font-s13 text-success push-5">
                                <a href="<?= Url::to(['actions/view', 'id' => $action->id]) ?>">
                                    Начало: <?= $action->start_at ?> - Окончание: <?= $action->end_at ?>
                                </a>
                            </div>
                            <a href="<?= Url::to(['actions/view', 'id' => $action->id]) ?>"><?php $lang_action['text_preview'] ?></a>
                        </div>
                            <?php endforeach; ?>
                        <?}?>
                    </div>
                </div>
                <!-- END Classic -->


                <!-- Classic -->
                <div class="tab-pane fade fade-up" id="search-news">
                    <div class="border-b push-30">
                        <h2 class="push-10"><?php if (!empty($news)){ echo count($news); }else{ echo 0;};  ?> <span class="h5 font-w400 text-muted">новостей найдено</span></h2>
                    </div>
                    <?php if (!empty($news)) {?>
                        <?php foreach ($news as $newsOne){?>
                            <?php $lang_news = $newsOne->getDataitems();?>
                    <div class="row items-push">
                        <div class="col-md-12">
                            <h3 class="h5 font-w600">
                                <a class="link-effect" href="javascript:void(0)"><?= $lang_news['title'] ?></a>
                            </h3>
                            <div class="font-s13 text-success push-5"><?= $newsOne->date ?></div>
                            <a href="<?= Url::to(['news/view', 'id' => $newsOne->id]) ?>"><?= $lang_news['description'] ?></a>
                        </div>
                    </div>
                            <?}?>
                    <?}?>
                </div>
                <!-- END Classic -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->