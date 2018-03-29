<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this yii\web\View */
///* @var $model common\models\Pages */

$this->title = "404 ошибка";

?>



<!-- Main Container -->
<main id="main-container">
    <!-- Hero Content -->
    <div class="bg-image" style="background-image: url(
    <?php if (!empty($model->main_img)){ echo $model->getImage();}else{
        echo '/backend/web/img/noimage.png';
    } ?>
            );">
        <div class="bg-primary-dark-op">
            <section class="content content-full content-boxed overflow-hidden">
                <!-- Section Content -->
                <div class="push-30-t push-30 text-center">
                    <a href="<?= Url::to(Yii::getAlias('@site').'/'. $model->slug) ?>" target="_blank">
                        <h1 class="h2 text-white push-10"><?php if (!empty($model->name)) echo $model->name ?></h1>
                        <h2 class="h5 text-white-op"><i class="si si-screen-desktop"></i> Предпросмотр в новом окне</h2>
                    </a>
                </div>
                <!-- END Section Content -->
            </section>
        </div>
    </div>
    <!-- END Hero Content -->

    <!-- Side Content and Product -->
    <section class="content content-boxed">
        <div class="row">
            <div class="col-lg-12">
                <div class="block-header bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                <?= Yii::t('app', 'Страница : ')?><?= $this->title?>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <?php echo Breadcrumbs::widget(['links' => [
                                    $this->title
                                ]]); ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
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
                                            <a href="#ecom-product-comments">Переводы</a>
                                        </li>
                                        <li>
                                            <a href="#ecom-product-seo">SEO && OG</a>
                                        </li>
                                    </ul>
                                    <div class="block-content tab-content">
                                        <div class="tab-pane pull-r-l active" id="ecom-product-info">

                                            <?= DetailView::widget([
                                                'model' => $model,
                                                'attributes' => [
                                                    'id',
                                                    'name',
                                                    'slug',
                                                    [
                                                        'attribute'=> 'visible',
                                                        'format' => 'html',
                                                        'value' => function($model){
                                                            return $model->visible ? '<span class="text-primary">Включено</span>' : '<span class="text-primary">Нет</span>';
                                                        }
                                                    ],
                                                ],
                                            ]) ?>

                                        </div>

                                        <div class="tab-pane pull-r-l" id="ecom-product-comments">

                                            <?= GridView::widget([
                                                'dataProvider' => new ActiveDataProvider(['query' => $model->getPagesLangs()]),
                                                'layout' => "{items}\n{pager}",
                                                'columns' => [

                                                    'lang',
                                                    'title_1',

                                                    [
                                                        'class' => 'yii\grid\ActionColumn',
                                                        'template' => '{update} {delete} {link}',
                                                        'buttons' => [
                                                            'delete' => function ($url,$model,$key) {
                                                                return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                                                    ['pages-lang/delete', 'id' => $model->id, 'item_id' => $model->item_id],
                                                                    ['data-method' => 'post']
                                                                );
                                                            },
                                                        ],
                                                        'controller' => 'pages-lang',

                                                    ],
                                                ],
                                            ]); ?>

                                            <p>
                                                <?= Html::a(Yii::t('app', 'Добавить перевод контента страницы'), ['/pages-lang/create', 'item_id' => $model->id], ['class' => 'btn btn-block btn-warning push-20'])?>
                                            </p>
                                        </div>

                                        <div class="tab-pane pull-r-l" id="ecom-product-seo">
                                            <?php

                                            $tags = $model->getOGItem($model->id);

                                            if (!empty($tags)) {

                                                // get SEO and title, keywords, description on default language == Russian
                                                $seo = $model->getSEO($model->id);
                                                $lang_seo = $seo->getDataItemsAdmin();
                                                ?>
                                                <div class="block block-themed">
                                                    <div class="block-header bg-primary">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                                            </li>
                                                            <li>
                                                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                                            </li>
                                                            <li>
                                                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="block-content">
                                                        <ul class="list list-timeline pull-t">

                                                            <!-- System Notification -->
                                                            <li>
                                                                <div class="list-timeline-time">ru</div>
                                                                <i class="fa fa-cog list-timeline-icon bg-primary-dark"></i>
                                                                <div class="list-timeline-content">
                                                                    <p class="font-w600">Title</p>
                                                                    <p class="font-s13"><?= $lang_seo['title'] ?></p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="list-timeline-time">ru</div>
                                                                <i class="fa fa-cog list-timeline-icon bg-primary-dark"></i>
                                                                <div class="list-timeline-content">
                                                                    <p class="font-w600">Keywords</p>
                                                                    <p class="font-s13"><?= $lang_seo['keywords'] ?></p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="list-timeline-time">ru</div>
                                                                <i class="fa fa-cog list-timeline-icon bg-primary-dark"></i>
                                                                <div class="list-timeline-content">
                                                                    <p class="font-w600">Description</p>
                                                                    <p class="font-s13"><?= $lang_seo['description'] ?></p>
                                                                </div>
                                                            </li>
                                                            <!-- END System Notification -->
                                                        </ul>
                                                    </div>
                                                </div>

                                                <?php echo GridView::widget([

                                                    'dataProvider' => new ActiveDataProvider(['query' => $model->getOpenGraph()]),
                                                    'layout' => "{items}\n{pager}",
                                                    'columns' => [
//                                'GAuthor',
                                                        [
                                                            'class' => 'yii\grid\ActionColumn',
                                                            'template' => '{update} {delete} {link}',
                                                            'buttons' => [
                                                                'delete' => function ($url, $model, $key) {
                                                                    return Html::a('<btn class="btn btn-danger">Удалить</btn>',
                                                                        ['opengraf/delete', 'id' => $model->id, 'itemId' => $model->itemId, 'controller' => \Yii::$app->controller->id],
                                                                        ['data-method' => 'post']
                                                                    );
                                                                },
                                                                'update' => function ($url, $model, $key) {
                                                                    return Html::a('<btn class="btn btn-primary">Редактировать</span>',
                                                                        ['opengraf/update', 'id' => $model->id, 'controller' => \Yii::$app->controller->id],
                                                                        ['data-method' => 'post']
                                                                    );
                                                                },
                                                            ],
                                                            'controller' => 'opengraf',

                                                        ],
                                                    ],
                                                ]);

                                            }else{
                                                $controller = \Yii::$app->controller->id;

                                                echo Html::a('Создать SEO && OG тэги', [
                                                    'opengraf/create',
                                                    'itemId' => $model->id,
                                                    'modelName' => $model::className(),
                                                    'controller' => $controller
                                                ], ['class' => 'btn btn-block btn-primary push-20']);
                                            }



                                            ?>

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
    <!-- END Side Content and Product -->
</main>
<!-- END Main Container -->
