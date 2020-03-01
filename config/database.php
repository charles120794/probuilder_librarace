<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_SETTING_CONNECTION', 'settings'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'settings' => [
            'driver' => 'mysql',
            'host' => env('DB_SETTING_HOST', '127.0.0.1'),
            'port' => env('DB_SETTING_PORT', '3306'),
            'database' => env('DB_SETTING_DATABASE', 'settings'),
            'username' => env('DB_SETTING_USERNAME', 'root'),
            'password' => env('DB_SETTING_PASSWORD', ''),
            'unix_socket' => env('DB_SETTING_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        
        'penro' => [
            'driver' => 'mysql',
            'host' => env('DB_WEB_HOST', '127.0.0.1'),
            'port' => env('DB_WEB_PORT', '3306'),
            'database' => env('DB_WEB_DATABASE', 'website'),
            'username' => env('DB_WEB_USERNAME', 'root'),
            'password' => env('DB_WEB_PASSWORD', ''),
            'unix_socket' => env('DB_WEB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'gender' => [
            'driver' => 'mysql',
            'host' => env('DB_GAD_HOST', '127.0.0.1'),
            'port' => env('DB_GAD_PORT', '3306'),
            'database' => env('DB_GAD_DATABASE', 'gender'),
            'username' => env('DB_GAD_USERNAME', 'root'),
            'password' => env('DB_GAD_PASSWORD', ''),
            'unix_socket' => env('DB_GAD_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'librarace' => [
            'driver' => 'mysql',
            'host' => env('DB_LIBRARACE_HOST', '127.0.0.1'),
            'port' => env('DB_LIBRARACE_PORT', '3306'),
            'database' => env('DB_LIBRARACE_DATABASE', 'librarace'),
            'username' => env('DB_LIBRARACE_USERNAME', 'root'),
            'password' => env('DB_LIBRARACE_PASSWORD', ''),
            'unix_socket' => env('DB_LIBRARACE_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
