<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 2/26/18
 * Time: 7:43 PM
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\LoginAsset;
use common\widgets\Alert;
use frontend\widgets\LangWidget;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <title>InJazz - login</title>
    
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="/backend/web/favicon.ico">

    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Web fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
 <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- Login Content -->
<div class="content overflow-hidden">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <!-- Login Block -->
            <div class="block block-themed animated fadeIn">
                <div class="block-header bg-primary">
                    <ul class="block-options">

                    </ul>
                    <h3 class="block-title">Вход в панель управления</h3>
                </div>
                <div class="block-content block-content-full block-content-narrow">
                    <!-- Login Title -->
                    <h1 class="h2 font-w600 push-30-t push-5">InJazz</h1>

                   <?= $content ?>

                </div>
            </div>
            <!-- END Login Block -->
        </div>
    </div>
</div>
<!-- END Login Content -->

<!-- Login Footer -->
<div class="push-10-t text-center animated fadeInUp">
    <small class="text-muted font-w600"><span class="js-year-copy"></span> &copy; S-Produccion</small>
</div>
<!-- END Login Footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>