<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для заполнения таблицы tw_backdrop_sepia.
 */
class TwBackdropSepiaSeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_backdrop_sepia данными.
     */
    public function run(): void
    {
        if (DB::table('tw_backdrop_sepia')->count() == 0) {
            DB::table('tw_backdrop_sepia')->insert([
                ['name' => 'backdrop-sepia-0', 'value' => 'sepia(0)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-sepia-25', 'value' => 'sepia(0.25)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-sepia-75', 'value' => 'sepia(0.75)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-sepia', 'value' => 'sepia(1)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
