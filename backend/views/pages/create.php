<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pages */

$this->title = Yii::t('app', 'Добавить страницу');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'langs' => $langs
    ]) ?>

</div>
