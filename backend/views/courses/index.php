<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсы';
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
                        <form class="form-horizontal" method="get" action="<?= Url::to(['courses/search']) ?>">
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
                            'attribute' => 'small_img',
                            'format'=> 'html',
                            'value' => function($data){
                                return Html::img($data->getPreviewImg(), ['width' => 180]);

                            }
                        ],
                        [
                            'attribute'=> 'type',
                            'format' => 'html',
                            'label' => 'Возрастная группа',
                            'value' => function($model){
                                return $model->visible ? '<span class="text-primary">Детский</span>' : '<span class="text-primary">Для взрослых</span>';
                            }
                        ],
                        'name',
//                        'slug',

//                        'main_img',
//                        'small_img',
                        //'visible',
                        //'sort',

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

