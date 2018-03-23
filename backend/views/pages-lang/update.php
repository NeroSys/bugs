<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagesLang */

$this->title = Yii::t('app', 'Обновить контент: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('lang', 'Страницы'), 'url' => ['pages/index']];
$this->params['breadcrumbs'][] = ['label' => $model->item->name, 'url' => ['pages/view', 'id' =>$model->item_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>
<div class="pages-lang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
