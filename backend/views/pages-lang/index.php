<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesLangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pages Langs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-lang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Pages Lang'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'item_id',
            'lang_id',
            'lang',
            'title_1',
            // 'text_1',
            // 'title_2',
            // 'text_2',
            // 'title_3',
            // 'text_3',
            // 'title_4',
            // 'text_4',
            // 'title_5',
            // 'text_5',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
