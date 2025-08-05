<?php

use Laravel\Telescope\Http\Middleware\Authorize;
use Laravel\Telescope\Watchers;

return [

    /*
    |--------------------------------------------------------------------------
    | Telescope Plus Master Switch
    |--------------------------------------------------------------------------
    |
    | This option may be used to disable all Telescope Plus watchers regardless
    | of their individual configuration, which simply provides a single
    | and convenient way to enable or disable Telescope Plus data storage.
    |
    */

    'enabled' => env('TELESCOPE_PLUS_PLUS_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Telescope Plus Domain
    |--------------------------------------------------------------------------
    |
    | This is the subdomain where Telescope Plus will be accessible from. If the
    | setting is null, Telescope Plus will reside under the same domain as the
    | application. Otherwise, this value will be used as the subdomain.
    |
    */

    'domain' => env('TELESCOPE_PLUS_PLUS_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Telescope Plus Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Telescope Plus will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => env('TELESCOPE_PLUS_PLUS_PATH', 'telescope'),

    /*
    |--------------------------------------------------------------------------
    | Telescope Plus Storage Driver
    |--------------------------------------------------------------------------
    |
    | This configuration options determines the storage driver that will
    | be used to store Telescope's data. In addition, you may set any
    | custom options as needed by the particular driver you choose.
    |
    */

    'driver' => env('TELESCOPE_PLUS_PLUS_DRIVER', 'database'),

    'storage' => [
        'database' => [
            'connection' => env('TELESCOPE_PLUS_PLUS_CONNECTION', 'mysql'),
            'chunk' => 1000,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Telescope Plus Queue
    |--------------------------------------------------------------------------
    |
    | This configuration options determines the queue connection and queue
    | which will be used to process ProcessPendingUpdate jobs. This can
    | be changed if you would prefer to use a non-default connection.
    |
    */

    'queue' => [
        'connection' => env('TELESCOPE_PLUS_PLUS_QUEUE_CONNECTION', null),
        'queue' => env('TELESCOPE_PLUS_PLUS_QUEUE', null),
        'delay' => env('TELESCOPE_PLUS_PLUS_QUEUE_DELAY', 10),
    ],

    /*
    |--------------------------------------------------------------------------
    | Telescope Plus Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Telescope Plus route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => [
        'web',
        Authorize::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Allowed / Ignored Paths & Commands
    |--------------------------------------------------------------------------
    |
    | The following array lists the URI paths and Artisan commands that will
    | not be watched by Telescope. In addition to this list, some Laravel
    | commands, like migrations and queue commands, are always ignored.
    |
    */

    'only_paths' => [
        // 'api/*'
    ],

    'ignore_paths' => [
        'livewire*',
        'nova-api*',
        'pulse*',
    ],

    'ignore_commands' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Telescope Plus Watchers
    |--------------------------------------------------------------------------
    |
    | The following array lists the "watchers" that will be registered with
    | Telescope. The watchers gather the application's profile data when
    | a request or task is executed. Feel free to customize this list.
    |
    */

    'watchers' => [
        Watchers\BatchWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_BATCH_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_BATCH_WATCHER_ON_PRODUCTION', false),
            'ignore' => [],
        ],

        Watchers\CacheWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_CACHE_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_CACHE_WATCHER_ON_PRODUCTION', false),
            'hidden' => [],
            'ignore' => [],
        ],

        Watchers\ClientRequestWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_CLIENT_REQUEST_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_CLIENT_REQUEST_WATCHER_ON_PRODUCTION', false),
            'ignore_http_methods' => [],
            'ignore_status_codes' => [],
        ],

        Watchers\CommandWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_COMMAND_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_COMMAND_WATCHER_ON_PRODUCTION', false),
            'ignore' => [],
        ],

        Watchers\DumpWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_DUMP_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_DUMP_WATCHER_ON_PRODUCTION', false),
            'always' => env('TELESCOPE_PLUS_DUMP_WATCHER_ALWAYS', false),
        ],

        Watchers\EventWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_EVENT_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_EVENT_WATCHER_ON_PRODUCTION', false),
            'ignore' => [],
        ],

        Watchers\ExceptionWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_EXCEPTION_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_EXCEPTION_WATCHER_ON_PRODUCTION', false),
            'ignore' => [],
        ],

        Watchers\GateWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_GATE_WATCHER', true),
            'ignore_abilities' => [],
            'ignore_packages' => true,
            'ignore_paths' => [],
        ],

        Watchers\JobWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_JOB_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_JOB_WATCHER_ON_PRODUCTION', false),
        ],

        Watchers\LogWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_LOG_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_LOG_WATCHER_ON_PRODUCTION', false),
            'level' => 'error',
        ],

        Watchers\MailWatcher::class => env('TELESCOPE_PLUS_MAIL_WATCHER', true),

        Watchers\ModelWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_MODEL_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_MODEL_WATCHER_ON_PRODUCTION', false),
            'events' => ['eloquent.*'],
            'hydrations' => true,
        ],

        Watchers\NotificationWatcher::class => env('TELESCOPE_PLUS_NOTIFICATION_WATCHER', true),

        Watchers\QueryWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_QUERY_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_QUERY_WATCHER_ON_PRODUCTION', false),
            'ignore_packages' => true,
            'ignore_paths' => [],
            'slow' => 100,
        ],

        Watchers\RedisWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_REDIS_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_REDIS_WATCHER_ON_PRODUCTION', false),
        ],

        Watchers\RequestWatcher::class => [
            'enabled' => env('TELESCOPE_PLUS_REQUEST_WATCHER', true),
            'enabled_on_production' => env('TELESCOPE_PLUS_REQUEST_WATCHER_ON_PRODUCTION', false),
            'size_limit' => env('TELESCOPE_PLUS_RESPONSE_SIZE_LIMIT', 64),
            'ignore_http_methods' => [],
            'ignore_status_codes' => [],
        ],

        Watchers\ScheduleWatcher::class => env('TELESCOPE_PLUS_SCHEDULE_WATCHER', true),
        Watchers\ViewWatcher::class => env('TELESCOPE_PLUS_VIEW_WATCHER', true),
    ],
];
