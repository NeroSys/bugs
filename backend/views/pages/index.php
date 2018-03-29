<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Страницы');
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

                        'id',
                        'name',
                        'slug',
                        'url:url',
//            'main_img',
                        //'small_img',
                        'visible',
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

