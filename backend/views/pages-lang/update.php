<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\PagesLang */

$this->title = Yii::t('app', 'Работа с контентом {modelClass}', [
    'modelClass' => 'страницы',
]);

$page = \common\models\Pages::find()->where(['id' => $model->item_id])->one();
?>

<!-- Main Container -->
<main id="main-container">
    <!-- Hero Content -->
    <section class="content content-boxed">
        <div class="row">
            <div class="col-lg-12">
                <div class="block-header bg-gray-lighter">
                    <div class="row items-push">

                        <div class="col-sm-12 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <?php echo Breadcrumbs::widget(['links' => [
                                    [
                                        'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                                        'label' => Yii::t('app', 'Вернуться на титул страницы'), 'url' => ['pages/'.$page->slug]
                                    ],
                                    $this->title
                                ]]); ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </section>
</main>