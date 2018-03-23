<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model common\models\Opengraf */

if ($modelName == 'common\models\Pages'){

    $view = $item->slug;
}else{
    $view = 'view';
}
$this->title = Yii::t('app', 'Добавить тэги для SEO && OG');
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
                                        'label' => Yii::t('app', 'Вернуться на страницу просмотра: '),
                                        'url' => [$controller.'/'.$view, 'id' => $itemId]
                                    ],
                                    $this->title
                                ]]); ?>
                            </ol>
                        </div>
                        <div class="col-sm-12">
                            <h3 class="page-heading">
                                <?= Html::encode($this->title) ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <?= $this->render('_form', [
                'model' => $model,
                'itemId' => $itemId,
                'modelName' => $modelName,
                'langs' => $langs
            ]) ?>
        </div>
    </section>
</main>
