<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для таблицы tw_themes.
 *
 * @author Smetanin Sergey
 */
class TwThemesSeed implements SeederInterface
{

    /**
     * Выполняет сидинг данных
     */
    public function run(): void
    {
        // Получаем id первой доступной темы (например, default тема)
        $themeId = DB::table('tw_themes')->first()->id ?? null;

        // Если темы нет, создаем новую тему
        if (is_null($themeId)) {
            DB::table('tw_themes')->insertGetId([
                'theme_id' => 1,
                'name' => 'default',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
