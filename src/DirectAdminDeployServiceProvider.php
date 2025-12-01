<?php

namespace CocomediaNL\LaravelDirectAdminDeploy;

use Illuminate\Support\ServiceProvider;
use CocomediaNL\LaravelDirectAdminDeploy\Commands\DeploySharedCommand;
use CocomediaNL\LaravelDirectAdminDeploy\Commands\PublishWorkflowCommand;
use CocomediaNL\LaravelDirectAdminDeploy\Commands\SetupAutomatedDeployCommand;
use CocomediaNL\LaravelDirectAdminDeploy\Commands\DeployAndSetupAutomatedCommand;

class DirectAdminDeployServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/directadmin-deploy.php', 'directadmin-deploy'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                DeploySharedCommand::class,
                PublishWorkflowCommand::class,
                SetupAutomatedDeployCommand::class,
                DeployAndSetupAutomatedCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/config/directadmin-deploy.php' => config_path('directadmin-deploy.php'),
            ], 'directadmin-deploy-config');

            $this->publishes([
                __DIR__.'/../stubs/directadmin-deploy.yml' => base_path('.github/workflows/directadmin-deploy.yml'),
            ], 'directadmin-deploy-workflow');
        }
    }
}
