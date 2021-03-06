<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widgets\LoginFormWidget;
use frontend\components\FBFWidget;
use frontend\widgets\LangWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="popup_on">
<?php $this->beginBody() ?>
<?= (Yii::$app->user->isGuest ? LoginFormWidget::widget([]) : ''); ?>

<?=$content?>

<?//= FBFWidget::widget([]) ?>

<?php $this->endBody() ?>
</body>
</html>
    <?php $this->endPage() ?>
