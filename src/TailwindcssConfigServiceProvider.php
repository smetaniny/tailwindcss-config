<?php

namespace Smetaniny\TailwindcssConfig;

use Illuminate\Support\ServiceProvider;
use Smetaniny\TailwindcssConfig\Commands\SeedCommand;

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

    protected function bootForConsole(): void
    {
        // Регистрируем команду импорта категорий php artisan import:categories
        $this->commands([
            SeedCommand::class,
        ]);
    }
}
