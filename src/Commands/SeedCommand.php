<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\Commands;

use Illuminate\Console\Command;
use Smetaniny\TailwindcssConfig\Commands\Services\SeederInvokerCommand;
use Smetaniny\TailwindcssConfig\seeders\TwAccentColorsSeed;
use Smetaniny\TailwindcssConfig\seeders\TwAnimationsSeed;
use Smetaniny\TailwindcssConfig\seeders\TwAriaSeed;
use Smetaniny\TailwindcssConfig\seeders\TwAspectRatioSeed;
use Smetaniny\TailwindcssConfig\seeders\TwBackdropBlurSeed;
use Smetaniny\TailwindcssConfig\seeders\TwBackdropBrightnessSeed;
use Smetaniny\TailwindcssConfig\seeders\TwBackdropContrastSeed;
use Smetaniny\TailwindcssConfig\seeders\TwBackdropGrayscaleSeed;
use Smetaniny\TailwindcssConfig\seeders\TwBackdropHueRotateSeed;
use Smetaniny\TailwindcssConfig\seeders\TwBackdropInvertSeed;
use Smetaniny\TailwindcssConfig\seeders\TwBackdropOpacitySeed;
use Smetaniny\TailwindcssConfig\seeders\TwBackdropSaturateSeed;
use Smetaniny\TailwindcssConfig\seeders\TwBackdropSepiaSeed;
use Smetaniny\TailwindcssConfig\seeders\TwBackgroundColorsSeed;
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
        $seederInvoker->addCommand(app(TwAccentColorsSeed::class));
        $seederInvoker->addCommand(app(TwAnimationsSeed::class));
        $seederInvoker->addCommand(app(TwAriaSeed::class));
        $seederInvoker->addCommand(app(TwAspectRatioSeed::class));
        $seederInvoker->addCommand(app(TwBackdropBlurSeed::class));
        $seederInvoker->addCommand(app(TwBackdropBrightnessSeed::class));
        $seederInvoker->addCommand(app(TwBackdropContrastSeed ::class));
        $seederInvoker->addCommand(app(TwBackdropGrayscaleSeed ::class));
        $seederInvoker->addCommand(app(TwBackdropHueRotateSeed ::class));
        $seederInvoker->addCommand(app(TwBackdropInvertSeed ::class));
        $seederInvoker->addCommand(app(TwBackdropOpacitySeed ::class));
        $seederInvoker->addCommand(app(TwBackdropSaturateSeed ::class));
        $seederInvoker->addCommand(app(TwBackdropSepiaSeed ::class));
        $seederInvoker->addCommand(app(TwBackgroundColorsSeed ::class));

        // Запускаем все сидеры
        $seederInvoker->runAll();

        // Выводим сообщение об успешном выполнении
        $this->info('Все сидеры успешно выполнены!');
    }
}
