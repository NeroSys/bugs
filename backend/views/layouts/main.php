<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;


if (Yii::$app->controller->action->id === 'login') {
        echo $this->render(
            'main-login',
            ['content' => $content]
        );
} elseif(!Yii::$app->user->identity) {

    echo $this->render(
        'main-login',
        ['content' => $content]
    );
}else{
AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="en"> <!--<![endif]-->
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="/backend/web/favicon.ico">

<!--    <link rel="apple-touch-icon" sizes="57x57" href="/backend/web/img/favicons/apple-touch-icon-57x57.png">-->
<!--    <link rel="apple-touch-icon" sizes="60x60" href="/backend/web/img/favicons/apple-touch-icon-60x60.png">-->
<!--    <link rel="apple-touch-icon" sizes="72x72" href="/backend/web/img/favicons/apple-touch-icon-72x72.png">-->
<!--    <link rel="apple-touch-icon" sizes="76x76" href="/backend/web/img/favicons/apple-touch-icon-76x76.png">-->
<!--    <link rel="apple-touch-icon" sizes="114x114" href="/backend/web/img/favicons/apple-touch-icon-114x114.png">-->
<!--    <link rel="apple-touch-icon" sizes="120x120" href="/backend/web/img/favicons/apple-touch-icon-120x120.png">-->
<!--    <link rel="apple-touch-icon" sizes="144x144" href="/backend/web/img/favicons/apple-touch-icon-144x144.png">-->
<!--    <link rel="apple-touch-icon" sizes="152x152" href="/backend/web/img/favicons/apple-touch-icon-152x152.png">-->
<!--    <link rel="apple-touch-icon" sizes="180x180" href="/backend/web/img/favicons/apple-touch-icon-180x180.png">-->
    <!-- END Icons -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

</head>
<body>
<?php $this->beginBody() ?>
<!-- Page Container -->

<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">


    <!-- Sidebar -->
    <?= $this->render('menu.php') ?>
    <!-- END Sidebar -->

    <!-- Header -->
    <?= $this->render('header.php') ?>
    <!-- END Header -->

    <!-- Main Container -->
    <?= $content ?>
    <!-- END Main Container -->

    <!-- Footer -->
    <?= $this->render('footer.php') ?>
    <!-- END Footer -->
</div>
<!-- END Page Container -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?}?>