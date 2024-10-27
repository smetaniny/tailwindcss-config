<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig;

use Illuminate\Support\ServiceProvider;
use Smetaniny\TailwindcssConfig\Commands\SeedCommand;

/**
 *
 *
 * @author Smetanin Sergey
 */
class TailwindcssConfigServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     *
     */
    public function boot(): void
    {

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Запускаем сидеры
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     *
     *
     */
    protected function bootForConsole(): void
    {
        // Регистрируем команду php artisan import:seed-tailwindcss-config
        $this->commands([
            SeedCommand::class,
        ]);
    }
}
