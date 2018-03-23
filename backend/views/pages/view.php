<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'slug',
            'url:url',
            'main_img',
            'small_img',
            'visible',
            'sort',
        ],
    ]) ?>

    <p>Translations</p>

    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider(['query' => $model->getPagesLangs()]),
        'layout' => "{items}\n{pager}",
        'columns' => [

            'lang',
            'title_1:ntext',
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

    <p>OG + SEO</p>

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
