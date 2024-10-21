<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для заполнения таблицы tw_backdrop_contrast.
 */
class TwBackdropContrastSeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_backdrop_contrast данными.
     */
    public function run(): void
    {
        if (DB::table('tw_backdrop_contrast')->count() == 0) {
            DB::table('tw_backdrop_contrast')->insert([
                ['name' => 'backdrop-contrast-0', 'value' => 'contrast(0)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-contrast-50', 'value' => 'contrast(0.5)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-contrast-75', 'value' => 'contrast(0.75)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-contrast-100', 'value' => 'contrast(1)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-contrast-125', 'value' => 'contrast(1.25)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-contrast-150', 'value' => 'contrast(1.5)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-contrast-200', 'value' => 'contrast(2)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
