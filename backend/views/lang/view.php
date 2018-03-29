<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\Lang */

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
                                        'label' => Yii::t('lang', 'Языки сайта'), 'url' => ['index']],
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

                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [

                                            [
                                                'attribute' => 'img',
                                                'format'=> 'html',
                                                'value' => function($data){
                                                    return Html::img($data->getImage(), ['width' => 32]);

                                                }
                                            ],
                                            'id',
                                            'url:url',
                                            'local',
                                            'name',
                                            'default',
                                            'date_update:date',
                                            'date_create:date',
                                        ],
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- END Main Container -->



