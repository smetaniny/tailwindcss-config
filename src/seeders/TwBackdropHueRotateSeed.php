<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для заполнения таблицы tw_backdrop_hue_rotate.
 */
class TwBackdropHueRotateSeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_backdrop_hue_rotate данными.
     */
    public function run(): void
    {
        if (DB::table('tw_backdrop_hue_rotate')->count() == 0) {
            DB::table('tw_backdrop_hue_rotate')->insert([
                ['name' => 'backdrop-hue-rotate-0', 'value' => 'hue-rotate(0deg)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-hue-rotate-15', 'value' => 'hue-rotate(15deg)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-hue-rotate-30', 'value' => 'hue-rotate(30deg)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-hue-rotate-60', 'value' => 'hue-rotate(60deg)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-hue-rotate-90', 'value' => 'hue-rotate(90deg)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-hue-rotate-180', 'value' => 'hue-rotate(180deg)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
