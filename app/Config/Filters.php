<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf'        => \CodeIgniter\Filters\CSRF::class,
        'toolbar'     => \CodeIgniter\Filters\DebugToolbar::class,
        'honeypot'    => \CodeIgniter\Filters\Honeypot::class,
        'auth'        => \App\Filters\Auth::class,
        'forcehttps'  => \CodeIgniter\Filters\ForceHTTPS::class,
        'pagecache'   => \CodeIgniter\Filters\PageCache::class,
        'performance' => \CodeIgniter\Filters\PerformanceMetrics::class,
    ];
    

    public array $required = [
        'before' => [
            'forcehttps',
            'pagecache',
        ],
        'after' => [
            'pagecache',
            'performance',
            'toolbar',
        ],
    ];

    public array $globals = [
        'before' => [],
        'after' => [],
    ];

    public array $methods = [];

    public array $filters = [];
}
