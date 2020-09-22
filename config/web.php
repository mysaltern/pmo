<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$db4 = require __DIR__ . '/eos_db.php';
//$db2 = require __DIR__ . '/db2.php';
$db3 = require __DIR__ . '/db3.php';
$config = [
    'id' => 'basic',
    'language' => 'fa-IR',
    'timeZone' => 'Asia/Tehran',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
//    'as access' => [
//        'class' => 'mdm\admin\components\AccessControl',
//        'allowActions' => [
//            'site/*',
//            'admin/*',
//            'some-controller/some-action',
//        // The actions listed here will be allowed to everyone including guests.
//// So, 'admin/*' should not appear here in the production, of course.
//// But in the earlier stages of your development, you may probably want to
//// add a lot of actions here until you finally completed setting up rbac,
//// otherwise you may not even take a first step.
//        ]
//    ],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
//        'authManager' => [
//            'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
//        ],
//        'db2' => [
//
//            'class' => 'yii\db\Connection', //    'dsn' => 'mysql:host=192.168.1.70;dbname=EOS_99',
//            'driverName' => 'sqlsrv',
//            'dsn' => 'sqlsrv:Server=192.168.1.70;Database=EOS_98',
////    'connectionString' => 'sqlsrv:server=192.168.1.70;Database=EOS_99;',
////    'driverName' => 'sqlsrv',
//            'username' => 'software',
//            'password' => 'amd#2010',
//            'charset' => 'utf8',
//        ],
        'mycomponent' => [
            'class' => 'app\components\MyComponent',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'enableStrictParsing' => false,
            'rules' => [
// ...
            ],
        ],
        'request' => [
// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'milad',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'user' => [
//            'identityClass' => 'app\models\User',
//            'enableAutoLogin' => true,
//        ],
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
        'db' => $db,
//        'db2' => $db2,
        'db3' => $db3,
        'db4' => $db4,
    /*
      'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
      ],
      ],
     */
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'admins' => ['admin'],
            'confirmWithin' => 21600,
            'cost' => 12,
            'controllerMap' => [
                'admin' => 'app\controllers\user\AdminController',
                'profile' => 'app\controllers\user\ProfileController',
                'recovery' => 'app\controllers\user\RecoveryController',
                'registration' => 'app\controllers\user\RegistrationController',
                'security' => 'app\controllers\user\SecurityController',
                'settings' => 'app\controllers\user\SettingsController',
            ],
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
