<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для заполнения таблицы tw_backdrop_saturate.
 */
class TwBackdropSaturateSeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_backdrop_saturate данными.
     */
    public function run(): void
    {
        if (DB::table('tw_backdrop_saturate')->count() == 0) {
            DB::table('tw_backdrop_saturate')->insert([
                ['name' => 'backdrop-saturate-0', 'value' => 'saturate(0)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-saturate-50', 'value' => 'saturate(0.5)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-saturate-100', 'value' => 'saturate(1)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-saturate-150', 'value' => 'saturate(1.5)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-saturate-200', 'value' => 'saturate(2)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
