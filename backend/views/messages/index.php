<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use common\models\Courses;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Сообщения');
?>

<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- Header Tiles -->
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <?= Html::a(Yii::t('app', 'Добавить позицию'), ['create'], ['class' => 'btn btn-block btn-primary push-10']) ?>
            </div>
            <div class="col-sm-6 col-md-9">
                <ul>
                    <li class="js-header-search header-search">
                        <form class="form-horizontal" method="get" action="<?= Url::to(['messages/search']) ?>">
                            <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                                <input class="form-control" type="text" name="q" placeholder="Поиск в разделе..">
                                <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END Header Tiles -->

        <!-- All Products -->
        <div class="block">
            <div class="block-header bg-gray-lighter">
                <div class="row items-push">
                    <div class="col-sm-7">
                        <h1 class="page-heading">
                            <?= $this->title ?>
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
            <div class="block-content">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [

                        [
                            'attribute' => 'new',
                            'value' => function($model){
                                return !$model->new ? '' : '<a href="'. Url::to(['messages/view', 'id'=> $model->id]) .'" class="btn btn-warning">Новое</a>';
                            },
                            'format' => 'html',
                        ],
                        'date:date',
                        [
                            'attribute' => 'courses_id',
                            'value' => 'courses.name'
                        ],
                        'name',
                        'mail:email',
                        'phone',
                        'message:html',
                        [
                            'attribute'=> 'answered',
                            'format' => 'html',
                            'value' => function($model){
                                return $model->answered ? '<span class="text-primary">Обработано</span>' : '<span class="text-danger">Нет</span>';
                            }
                        ],

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
        <!-- END All Products -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
