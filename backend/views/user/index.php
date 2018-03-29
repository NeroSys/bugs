<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

Yii::$app->language = 'ru-RU';

$this->title = 'Пользователи';
?>

<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- Header Tiles -->
        <div class="row">
            <div class="col-sm-6 col-md-3">
<!--                --><?//= Html::a(Yii::t('app', 'Добавить позицию'), ['create'], ['class' => 'btn btn-block btn-primary push-10']) ?>
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
                        [
                            'attribute' => 'img',
                            'format'=> 'html',
                            'value' => function($data){
                                return Html::img($data->getImage(), ['width' => 120]);

                            }
                        ],
                        'id',
                        'username',
//                        'firstName',
//                        'lastName',
//                        [
//                            'attribute' => 'img',
//                            'format'=> 'html',
//                            'value' => function($data){
//                                return Html::img($data->getImage(), ['width' => 180]);
//
//                            }
//                        ],
//                        'address',
//                        'phone_1',
                        //'phone_2',
                        //'isNew',
                        [
                                'attribute' => 'moder',
                            'format' => 'html',
                            'value' => function($model){
                                return $model->moder == 0 ? '<span class="text-primary">Доступ</span>' : '<span class="text-danger">На модерации</span>';
                            }
                        ],
//                        'moder',
                        //'auth_key',
                        //'password_hash',
                        //'password_reset_token',
                        //'email:email',
                        //'status',
                        'created_at:date',
                        //'updated_at',

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

