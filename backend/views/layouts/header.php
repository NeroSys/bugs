<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 2/26/18
 * Time: 6:58 PM
 */
use yii\helpers\Url;
?>

<header id="header-navbar" class="content-mini content-mini-full">
    <!-- Header Navigation Right -->
    <ul class="nav-header pull-right">
        <li>
            <div class="btn-group">
                <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                    <img src=" <?php if (!empty(\Yii::$app->user->identity->img)){ echo \Yii::$app->user->identity->getImage();}else{
                        echo '/backend/web/img/avatars/admin.jpg';
                    } ?>" alt="Avatar">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header"><?= \Yii::$app->user->identity->username; ?></li>

                    <li class="divider"></li>
                    <li>
                        <a tabindex="-1" href="<?= Url::to(['/site/logout']) ?>">
                            <i class="si si-logout pull-right"></i>Выход
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
    <!-- END Header Navigation Right -->

    <!-- Header Navigation Left -->
    <ul class="nav-header pull-left">
        <li class="hidden-md hidden-lg">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                <i class="fa fa-navicon"></i>
            </button>
        </li>
        <li class="hidden-xs hidden-sm">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                <i class="fa fa-ellipsis-v"></i>
            </button>
        </li>

        <li class="js-header-search header-search">
            <form class="form-horizontal" method="get" action="<?= Url::to(['site/search']) ?>">
                <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                    <input class="form-control" type="text" name="q" placeholder="Поиск в папках..">
                    <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                </div>
            </form>
        </li>
    </ul>
    <!-- END Header Navigation Left -->
</header>
