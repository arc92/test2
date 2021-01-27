<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'queue',
        \insolita\opcache\Bootstrap::class
    ],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'redis' => [
            'class'=>'yii\redis\Connection',
            'hostname' => env('REDIS_HOST'), // the swarm service name
            'password' => env('REDIS_PASSWORD'),
            'port' => 6379,
            'database' => 0,
        ],
        'queue' => [
            'class' => 'yii\queue\redis\Queue',
            'redis' => 'redis', // Redis connection component or its config
            'channel' => 'queue', // Queue channel key
        ],
    ],
    'params' => $params,
    'controllerMap' => [
//        'fixture' => [ // Fixture generation command line.
//            'class' => 'yii\faker\FixtureController',
//        ],
        'opcache' => [
            'class' => \insolita\opcache\commands\OpcacheController::class
        ]
    ],

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
