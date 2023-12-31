<?php

namespace Botble\Menu\Providers;

use Botble\Menu\Commands\ClearMenuCacheCommand;
use Botble\Base\Supports\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ClearMenuCacheCommand::class,
            ]);
        }
    }
}
