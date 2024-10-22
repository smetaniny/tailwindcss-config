<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для заполнения таблицы tw_backdrop_invert.
 */
class TwBackdropInvertSeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_backdrop_invert данными.
     */
    public function run(): void
    {
        if (DB::table('tw_backdrop_invert')->count() == 0) {
            DB::table('tw_backdrop_invert')->insert([
                ['name' => 'backdrop-invert-0', 'value' => 'invert(0)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-invert', 'value' => 'invert(100%)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
