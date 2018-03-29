<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 2/28/18
 * Time: 12:45 PM
 */
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->registerJsFile('js/pages/base_tables_datatables.js',  ['position' => yii\web\View::POS_END]);

$this->title = Yii::t('app', 'Результат локального поиска');
?>

<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">

        <!-- All Products -->
        <div class="block">
            <div class="block-header bg-gray-lighter">
                <div class="row items-push">
                    <div class="col-sm-7">
                        <h1 class="page-heading">
                            <?= $this->title ?>: <?= $q ?>
                        </h1>
                    </div>
                    <div class="col-sm-5 text-right hidden-xs">
                        <ol class="breadcrumb push-10-t">
                            <?php echo Breadcrumbs::widget(['links' => [
                                [
                                    'template' => "<li><a class=\"link-effect\">{link}</a></li>\n",
                                    'label' => Yii::t('lang', 'Сообщения'), 'url' => ['index']],
                                $this->title
                            ]]); ?>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Dynamic Table Simple -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Найдено <small><?php if (!empty($items)){ echo count($items);}else{ echo 0;} ?> позиций</small></h3>
                </div>
                <div class="block-content">
                    <?php if (!empty($items)): ?>
                    <!-- DataTables init on table by adding .js-dataTable-simple class, functionality initialized in js/pages/base_tables_datatables.js -->
                    <table class="table table-bordered table-striped js-dataTable-simple">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Отправитель</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($items as $item): ?>
                        <tr>
                            <td class="text-center"><?= $item->id ?></td>
                            <td class="font-w600"><?= $item->name ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                        ['messages/view', 'id' => $item->id],
                                        ['data-method' => 'post']) ?>
                                    <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                        ['messages/update', 'id' => $item->id],
                                        ['data-method' => 'post']) ?>
                                    <?= Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                        ['messages/delete', 'id' => $item->id],
                                        ['data-method' => 'post']) ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <p>По запросу ничего не найдено.</p>
                    <?php endif; ?>
                </div>
            </div>
            <!-- END Dynamic Table Simple -->
        </div>
        <!-- END All Products -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

