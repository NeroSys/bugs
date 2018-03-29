<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model common\models\Messages */

$this->title = $model->name;
?>
<!-- Main Container -->
<main id="main-container">

    <!-- Side Content and Product -->
    <section class="content content-boxed">
        <div class="row">
            <div class="col-lg-12">
                <div class="block-header bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">

                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <?php echo Breadcrumbs::widget(['links' => [
                                    [
                                        'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                                        'label' => Yii::t('lang', 'Сообщения'), 'url' => ['index']],
                                    $this->title
                                ]]); ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Side Content -->
                <div class="js-nav-content visible-lg">
                    <!-- Categories -->
                    <div class="block">
                        <div class="block-content">
                            <ul>
                                <li>
                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            'id',
                                            'name',
                                            'mail',
                                            'phone',
                                            [
                                                    'attribute' => 'courses_id',
                                                'value' => $model->courses->name
                                            ],
                                            'courses_id'
                                        ],
                                    ]) ?>
                                </li>
<!--                                <li>-->
<!--                                    --><?//= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn btn-block btn-primary push-10']) ?>
<!--                                </li>-->
                                <li>
                                    <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-block btn-danger push-10',
                                        'data' => [
                                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- END Categories -->
                </div>
                <!-- END Side Content -->
            </div>
            <div class="col-lg-8">


                <!-- Discussion Block -->
                <div class="block">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button data-toggle="scroll-to" data-target="#forum-reply-form" type="button"><i class="fa fa-reply"></i> Reply</button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Текст сообщения</h3>
                    </div>
                    <div class="block-content">
                        <!-- Discussion -->
                        <table class="table table-striped table-borderless">
                            <tbody>
                            <tr>
                                <td>
                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            [
                                                'attribute'=> 'message',
                                                'format' => 'html',
                                                'label'=> ''
                                            ],
                                        ],
                                    ]) ?>
                                </td>
                            </tr>
                            <tr id="forum-reply-form">
                                <td class="hidden-xs"></td>
                                <td class="font-s13 text-muted">
                                    <a href=""><?= Yii::$app->user->identity->username ?></a> ответ
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center hidden-xs">
                                    <div class="push-10">
                                        <a href="base_pages_profile.html">
                                            <img class="img-avatar" src="/frontend/web/img/logo.png" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <form class="form-horizontal" action="" method="post" onsubmit="return false;">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <!-- CKEditor (js-ckeditor id is initialized in App() -> uiHelperCkeditor()) -->
                                                <!-- For more info and examples you can check out http://ckeditor.com -->
                                                <textarea id="js-ckeditor" name="ckeditor"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-reply"></i> Ответить</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- END Discussion -->
                    </div>
                </div>
                <!-- END Discussion Block -->

                <!-- Product -->
                <div class="block">
                    <div class="block-content">
                        <div class="row items-push">
                            <div class="col-xs-12">
                                <!-- Extra Info -->
                                <div class="block">

                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            [
                                                'attribute'=> 'message',
                                                'format' => 'html',
                                                'label'=> ''
                                            ],
                                        ],
                                    ]) ?>
                                </div>
                                <!-- END Extra Info -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Product -->
            </div>
        </div>
    </section>
    <!-- END Side Content and Product -->
</main>
<!-- END Main Container -->