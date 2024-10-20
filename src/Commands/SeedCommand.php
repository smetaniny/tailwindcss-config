<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\Commands;

use Illuminate\Console\Command;
use Smetaniny\TailwindcssConfig\Commands\Services\SeederInvokerCommand;
use Smetaniny\TailwindcssConfig\seeders\TwAccentColors;
use Smetaniny\TailwindcssConfig\seeders\TwAnimationsSeed;
use Smetaniny\TailwindcssConfig\seeders\TwContentSeed;
use Smetaniny\TailwindcssConfig\seeders\TwDarkModeSeed;
use Smetaniny\TailwindcssConfig\seeders\TwThemesSeed;

/**
 * Консольная команда для импорта данных Tailwind CSS в БД.
 */
class SeedCommand extends Command
{
    // Название и подпись консольной команды
    protected $signature = 'import:seed-tailwindcss-config';

    // Описание консольной команды
    protected $description = 'Импорт данных в БД';

    /**
     * Выполнение консольной команды.
     */
    public function handle(): void
    {
        $seederInvoker = new SeederInvokerCommand();

        // Добавляем все сидеры
        $seederInvoker->addCommand(app(TwThemesSeed::class));
        $seederInvoker->addCommand(app(TwContentSeed::class));
        $seederInvoker->addCommand(app(TwDarkModeSeed::class));
        $seederInvoker->addCommand(app(TwAccentColors::class));
        $seederInvoker->addCommand(app(TwAnimationsSeed::class));

        // Запускаем все сидеры
        $seederInvoker->runAll();

        // Выводим сообщение об успешном выполнении
        $this->info('Все сидеры успешно выполнены!');
    }
}
