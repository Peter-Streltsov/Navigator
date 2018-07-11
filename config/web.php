<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'name' => 'Наукометрия',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@sibilino/y2dygraphs' => '@vendor/sibilino/yii2-dygraphswidget/widget'
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['user', 'administrator', 'supervisor']
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Y8rKQYVMCvgPK-0Kf3ls6GJw30gSJFEa',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\identity\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'access' => [
            'class' => 'app\components\access'
        ],
        'counter' => [
            'class' => 'app\components\Counter',
        ],
        'data' => [
            'class' => 'app\components\Data'
        ],
        'yearselector' => [
            'class' => 'app\components\YearSelect'
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<action:(test|index|login|about|contact)>' => 'site/<action>'
            ],
        ],
    ],

    'modules' => [
        'control' => [
            'class' => 'app\modules\Control\ControlModule',
            'modules' => [
                'admin' => [
                    'class' => 'app\modules\Control\modules\Admin\Admin'
                ],
                'articles' => [
                    'class' => 'app\modules\Control\modules\articles\Articles'
                ]
            ],
        ],
        'public' => [
            'class' => 'app\modules\PublicAccess\PublicModule',
            'modules' => [
                'API' => [
                    'class' => 'app\modules\PublicAccess\modules\API'
                ]
            ]
        ],
        'gridview' => [
            'class' => 'kartik\grid\Module'
        ],
        'pdfjs' => [
            'class' => '\yii2assets\pdfjs\Module'
        ],
    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
