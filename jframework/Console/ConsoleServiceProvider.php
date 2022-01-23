<?php

namespace JFramework\Console;

use Illuminate\Database\Console\DumpCommand;
use Illuminate\Database\Console\Migrations\FreshCommand as MigrateFreshCommand;
use Illuminate\Database\Console\Migrations\InstallCommand as MigrateInstallCommand;
use Illuminate\Database\Console\Migrations\MigrateCommand;
use Illuminate\Database\Console\Migrations\MigrateMakeCommand;
use Illuminate\Database\Console\Migrations\RefreshCommand as MigrateRefreshCommand;
use Illuminate\Database\Console\Migrations\ResetCommand as MigrateResetCommand;
use Illuminate\Database\Console\Migrations\RollbackCommand as MigrateRollbackCommand;
use Illuminate\Database\Console\Migrations\StatusCommand as MigrateStatusCommand;
use Illuminate\Support\ServiceProvider;
use JFramework\Console\Commands\ConsoleMakeCommand;
use JFramework\Console\Commands\ControllerMakeCommand;
use JFramework\Console\Commands\EventMakeCommand;
use JFramework\Console\Commands\ListenerMakeCommand;
use JFramework\Console\Commands\ModelMakeCommand;
use JFramework\Console\Commands\ProviderMakeCommand;
use JFramework\Console\Commands\ServeCommand as CommandsServeCommand;
use JFramework\Console\Commands\ServiceMakeCommand;
use JFramework\Console\Commands\StorageLinkCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
        'Migrate' => 'command.migrate',
        'MigrateInstall' => 'command.migrate.install',
        'MigrateFresh' => 'command.migrate.fresh',
        'MigrateRefresh' => 'command.migrate.refresh',
        'MigrateReset' => 'command.migrate.reset',
        'MigrateRollback' => 'command.migrate.rollback',
        'MigrateStatus' => 'command.migrate.status',
        'SchemaDump' => 'command.schema.dump',
    ];

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $devCommands = [
        'MigrateMake'    => 'command.migrate.make',
        'EventMake'      => 'command.event.make',
        'ListenerMake'   => 'command.listener.make',
        'ModelMake'      => 'command.model.make',
        'ProviderMake'   => 'command.provider.make',
        'StorageLink'    => 'command.storage.link',
        'ConsoleMake'    => 'command.console.make',
        'ServiceMake'    => 'command.service.make',
        'ControllerMake' => 'command.controller.make',
        'Serve'          => 'command.serve',
    ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands(array_merge(
            $this->commands,
            $this->devCommands
        ));
    }

    /**
     * Register the given commands.
     *
     * @param  array  $commands
     * @return void
     */
    protected function registerCommands(array $commands)
    {
        foreach (array_keys($commands) as $command) {
            $this->{"register{$command}Command"}();
        }

        $this->commands(array_values($commands));
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateCommand()
    {
        $this->app->singleton('command.migrate', function ($app) {
            return new MigrateCommand($app['migrator'], $app['events']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateInstallCommand()
    {
        $this->app->singleton('command.migrate.install', function ($app) {
            return new MigrateInstallCommand($app['migration.repository']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateMakeCommand()
    {
        $this->app->singleton('command.migrate.make', function ($app) {
            // Once we have the migration creator registered, we will create the command
            // and inject the creator. The creator is responsible for the actual file
            // creation of the migrations, and may be extended by these developers.
            $creator = $app['migration.creator'];

            $composer = $app['composer'];

            return new MigrateMakeCommand($creator, $composer);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateFreshCommand()
    {
        $this->app->singleton('command.migrate.fresh', function () {
            return new MigrateFreshCommand();
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateRefreshCommand()
    {
        $this->app->singleton('command.migrate.refresh', function () {
            return new MigrateRefreshCommand();
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateResetCommand()
    {
        $this->app->singleton('command.migrate.reset', function ($app) {
            return new MigrateResetCommand($app['migrator']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateRollbackCommand()
    {
        $this->app->singleton('command.migrate.rollback', function ($app) {
            return new MigrateRollbackCommand($app['migrator']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateStatusCommand()
    {
        $this->app->singleton('command.migrate.status', function ($app) {
            return new MigrateStatusCommand($app['migrator']);
        });
    }



    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerSchemaDumpCommand()
    {
        $this->app->singleton('command.schema.dump', function () {
            return new DumpCommand();
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerEventMakeCommand()
    {
        $this->app->singleton('command.event.make', function ($app) {
            return new EventMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerServiceMakeCommand()
    {
        $this->app->singleton('command.service.make', function ($app) {
            return new ServiceMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerControllerMakeCommand()
    {
        $this->app->singleton('command.controller.make', function ($app) {
            return new ControllerMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerServeCommand()
    {
        $this->app->singleton('command.serve', function ($app) {
            return new CommandsServeCommand();
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerListenerMakeCommand()
    {
        $this->app->singleton('command.listener.make', function ($app) {
            return new ListenerMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerModelMakeCommand()
    {
        $this->app->singleton('command.model.make', function ($app) {
            return new ModelMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerProviderMakeCommand()
    {
        $this->app->singleton('command.provider.make', function ($app) {
            return new ProviderMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerStorageLinkCommand()
    {
        $this->app->singleton('command.storage.link', function () {
            return new StorageLinkCommand();
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerConsoleMakeCommand()
    {
        $this->app->singleton('command.console.make', function ($app) {
            return new ConsoleMakeCommand($app['files']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array_merge(array_values($this->commands), array_values($this->devCommands));
    }
}
