<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@cropp' => "http://bugs/upload",
        '@site' => "http://bugs"
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'class' => Zelenin\yii\modules\I18n\components\I18N::className(),
            'languages' => ['ua', 'ru', 'en'],
            'translations' => [
                'yii' => [
                    'class' => yii\i18n\DbMessageSource::className()
                ]
            ]
        ],
    ],
];
