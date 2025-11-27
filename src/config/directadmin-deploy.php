<?php

return [
    /*
    |--------------------------------------------------------------------------
    | SSH Connection Settings
    |--------------------------------------------------------------------------
    |
    | These settings are used for SSH connections to your Hostinger server.
    | You can override these in your .env file.
    |
    */
    'ssh' => [
        'host' => env('DIRECTADMIN_SSH_HOST'),
        'username' => env('DIRECTADMIN_SSH_USERNAME'),
        'port' => env('DIRECTADMIN_SSH_PORT', 22),
        'timeout' => 30,
    ],

    /*
    |--------------------------------------------------------------------------
    | Deployment Settings
    |--------------------------------------------------------------------------
    |
    | Configuration for the deployment process.
    |
    */
    'deployment' => [
        'site_dir' => env('DIRECTADMIN_SITE_DIR'),
        'composer_flags' => '--no-dev --optimize-autoloader',
        'run_migrations' => true,
        'run_storage_link' => true,
        'run_config_cache' => false,
        'run_route_cache' => false,
        'run_view_cache' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | GitHub Actions Settings
    |--------------------------------------------------------------------------
    |
    | Configuration for GitHub Actions workflow generation.
    |
    */
    'github' => [
        'workflow_file' => '.github/workflows/directadmin-deploy.yml',
        'php_version' => '8.3',
        'default_branch' => 'main',
        'api_token' => env('GITHUB_API_TOKEN'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Server Paths
    |--------------------------------------------------------------------------
    |
    | Default paths on the DirectAdmin server.
    |
    */
    'paths' => [
        'domains' => 'domains',
        'public_html' => 'public_html',
        'public' => 'public',
    ],
];
