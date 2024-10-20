<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для таблицы tw_dark_mode.
 *
 *
 * @author Smetanin Sergey
 */
class TwDarkModeSeed implements SeederInterface
{
    /**
     * Запускает сидирование данных в таблицу tw_dark_mode.
     */
    public function run(): void
    {
        // Проверяем, пуста ли таблица
        if (DB::table('tw_dark_mode')->count() == 0) {
            // Вставляем запись в таблицу
            DB::table('tw_dark_mode')->insert([
                [
                    'theme_id' => 1,
                    'mode' => 'media',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
