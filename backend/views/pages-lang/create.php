<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PagesLang */

$this->title = Yii::t('app', 'Добавить контент');
$this->params['breadcrumbs'][] = ['label' => Yii::t('lang', 'Страницы'), 'url' => ['category/index']];
$this->params['breadcrumbs'][]  = ['label' => $model->item->name, 'url' => ['pages/view', 'id' =>$item_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,  'item_id' => $item_id
    ]) ?>

</div>
