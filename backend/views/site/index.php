<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 2/26/18
 * Time: 7:02 PM
 */

$this->title = 'Админ панель';

use yii\helpers\Url;
?>

<main id="main-container">
    <!-- Page Header -->
    <div class="bg-image overflow-hidden" style="background-image: url('/backend/web/img/animal.jpg');">
        <div class="bg-black-op">
            <div class="content content-narrow">
                <div class="block block-transparent">
                    <div class="block-content block-content-full">
                        <h1 class="h1 font-w300 text-white animated fadeInDown push-50-t push-5">Панель управления</h1>
                        <h2 class="h4 font-w300 text-white-op animated fadeInUp">Welcome <?=Yii::$app->user->identity->username?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content content-narrow">
        <!-- Stats -->
        <div class="row text-uppercase">
            <div class="col-xs-6 col-sm-6">
                <a class="block block-link-hover1" href="<?= Url::to(['courses/create']) ?>">
                    <div class="block-content block-content-full clearfix">
                        <div class="pull-right push-15-t push-15">
                            <i class="fa fa-plus fa-2x text-default-dark"></i>
                        </div>
                        <div class="text-muted">
                            <small><i class="si si-note"></i> Добавить новый курс</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-3">
                <a class="block block-link-hover1" href="<?= Url::to(['sliders/create']) ?>">
                    <div class="block-content block-content-full clearfix">
                        <div class="pull-right push-15-t push-15">
                            <i class="fa fa-plus fa-2x text-default-dark"></i>
                        </div>
                        <div class="text-muted">
                            <small><i class="si si-note"></i> Добавить новый слайд</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-3">
                <a class="block block-link-hover1" href="<?= Url::to(['messages/index']) ?>">
                    <div class="block-content block-content-full clearfix">
                        <div class="pull-right push-15-t push-15">
                            <i class="fa fa-commenting fa-2x text-default-dark"></i>
                        </div>
                        <div class="text-muted">
                            <small><i class="si si-note"></i> <?if (!empty($messagesNew)){ echo count($messagesNew);}else{ echo  0;} ?> новых</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- END Stats -->

        <!-- Top Products and Latest Orders -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Top Products -->
                <div class="block block-opt-refresh-icon4">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Новые сообщения</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-vcenter">
                            <tbody>
                            <?php if (!empty($messagesNew)){?>
                                <?php foreach ($messagesNew as $message) {?>
                                    <tr>
                                        <td class="text-center" style="width: 100px;">
                                            <a href="<?= Url::toRoute(['messages/view', 'id' => $message->id])?>"><strong><?= $message->name ?></strong></a>
                                        </td>
                                        <td class="text-center" style="width: 100px;">
                                            <a href="<?= Url::toRoute(['messages/view', 'id' => $message->id])?>"><strong><?= $message->message ?></strong></a>
                                        </td>
                                    </tr>
                                <?}?>
                            <?}else{?>
                            <tr>
                                <p>Новых сообщений нет</p>
                            </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Top Products -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
