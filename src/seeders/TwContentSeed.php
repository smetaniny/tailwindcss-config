<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для таблицы tw_content.
 *
 * @author Smetanin Sergey
 */
class TwContentSeed implements SeederInterface
{
    /**
     * Запускает сидирование данных в таблицу tw_content.
     */
    public function run(): void
    {
        // Проверяем, пуста ли таблица
        if (DB::table('tw_content')->count() == 0) {
            // Вставляем запись в таблицу
            DB::table('tw_content')->insert([
                [
                    'value' => 'path/to/file1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
