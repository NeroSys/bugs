<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
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
                                        'label' => Yii::t('lang', 'Пользователи'), 'url' => ['index']],
                                    $this->title
                                ]]); ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- Side Content -->
                <div class="js-nav-content visible-lg">
                    <!-- Categories -->
                    <div class="block">
                        <div class="block-content">
                            <ul>
                                <li>
                                    <img src="<?= $model->getImage() ?>" height="165">
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <?= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn btn-block btn-primary push-10']) ?>
                                </li>
                                <li>
                                    <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-block btn-danger push-10',
                                        'data' => [
                                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </li>
                                <li>
                                    <?php if ($model->moder == 1): ?>
                                        <?= Html::a(Yii::t('app', 'Разрешить'),  ['allow', 'id' => $model->id], ['class' => 'btn btn-block btn-success push-10']) ?>
                                    <?php else: ?>
                                        <?= Html::a(Yii::t('app', 'Запретить'),  ['disallow', 'id' => $model->id], ['class' => 'btn btn-block btn-warning push-10']) ?>
                                    <?php endif;?>

                                </li>
                            </ul>
                            <ul>

                            </ul>
                        </div>
                    </div>
                    <!-- END Categories -->
                </div>
                <!-- END Side Content -->
            </div>
            <div class="col-lg-9">

                <!-- Product -->
                <div class="block">
                    <div class="block-content">
                        <div class="row items-push">
                            <div class="col-xs-12">
                                <!-- Extra Info -->
                                <div class="block">
                                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                                        <li class="active">
                                            <a href="#ecom-product-info">Основная информация</a>
                                        </li>
                                        <li>
                                            <a href="#ecom-product-comments">Данные профайла</a>
                                        </li>
                                        <li>
                                            <a href="#ecom-product-pass">Пароли</a>
                                        </li>
                                    </ul>
                                    <div class="block-content tab-content">
                                        <div class="tab-pane pull-r-l active" id="ecom-product-info">
                                            <?= DetailView::widget([
                                                'model' => $model,
                                                'attributes' => [
                                                    'id',
                                                    'username',
                                                    [
                                                        'attribute' => 'moder',
                                                        'format' => 'html',
                                                        'value' => function($model){
                                                            return $model->moder == 0 ? '<span class="text-primary">Доступ</span>' : '<span class="text-danger">На модерации</span>';
                                                        }
                                                    ],
                                                    'status',
                                                    'created_at:date',
                                                    'updated_at:date',
                                                ],
                                            ]) ?>

                                        </div>

                                        <div class="tab-pane pull-r-l" id="ecom-product-comments">

                                            <?= DetailView::widget([
                                                'model' => $model,
                                                'attributes' => [

                                                    'firstName',
                                                    'lastName',
                                                    'address',
                                                    'phone_1',
                                                    'phone_2',
                                                    'email:email',

                                                ],
                                            ]) ?>

                                        </div>

                                        <div class="tab-pane pull-r-l" id="ecom-product-pass">


                                            <?= DetailView::widget([
                                                'model' => $model,
                                                'attributes' => [
                                                    'auth_key',
                                                    'password_hash',
                                                    'password_reset_token',
                                                ],
                                            ]) ?>
                                        </div>
                                    </div>
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
</main>
<!-- END Main Container -->