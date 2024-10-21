<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для заполнения таблицы tw_aspect_ratios
 */
class TwAspectRatioSeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_aspect_ratios данными.
     */
    public function run(): void
    {
        if (DB::table('tw_aspect_ratios')->count() == 0) {
            DB::table('tw_aspect_ratios')->insert([
                ['name' => 'auto', 'ratio' => 'auto', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'square', 'ratio' => '1 / 1', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'video', 'ratio' => '16 / 9', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
