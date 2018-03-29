<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Messages */

use yii\widgets\Breadcrumbs;

$this->title = Yii::t('app', 'Обновить данные : ') . $model->name;
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
                                        'label' => Yii::t('lang', 'Сообщения'), 'url' => ['index']
                                    ],
                                    [
                                        'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                                        'label' => $model->name, 'url' => ['messages/view', 'id' => $model->id]
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
                'model' => $model
            ]) ?>
        </div>
    </section>
</main>

