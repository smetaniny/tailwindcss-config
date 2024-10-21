<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для заполнения таблицы tw_backdrop_brightness.
 */
class TwBackdropBrightnessSeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_backdrop_brightness данными.
     */
    public function run(): void
    {
        if (DB::table('tw_backdrop_brightness')->count() == 0) {
            DB::table('tw_backdrop_brightness')->insert([
                ['name' => 'backdrop-brightness-0', 'value' => 'brightness(0)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-brightness-50', 'value' => 'brightness(0.5)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-brightness-75', 'value' => 'brightness(0.75)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-brightness-90', 'value' => 'brightness(0.9)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-brightness-95', 'value' => 'brightness(0.95)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-brightness-100', 'value' => 'brightness(1)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-brightness-105', 'value' => 'brightness(1.05)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-brightness-110', 'value' => 'brightness(1.1)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-brightness-125', 'value' => 'brightness(1.25)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-brightness-150', 'value' => 'brightness(1.5)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-brightness-200', 'value' => 'brightness(2)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
