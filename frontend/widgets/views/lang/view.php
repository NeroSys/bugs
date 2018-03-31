<?php
/**
 * Html код для вывода переключателя языков
 */
use yii\helpers\Html;
?>


<?php foreach ($langs as $lang):?>
                                <li><?= Html::a(Html::img($lang->getImage()), '/'.$lang->url.Yii::$app->getRequest()->getLangUrl()) ?></li>
<?php endforeach;?>
