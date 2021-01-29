<?php
dd(env('MYSQL_PASSWORD','123'));
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . env('MYSQL_HOST','localhost') . ';' . 'dbname=' . env('MYSQL_DATABASE','bccstyle'),
    'username' => env('MYSQL_USERNAME','root'),
    'password' => env('MYSQL_PASSWORD','Arcsin_360'),
    'charset' => 'utf8',



    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
