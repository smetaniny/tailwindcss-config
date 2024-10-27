<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для заполнения таблицы tw_backdrop_opacity.
 */
class TwBackdropOpacitySeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_backdrop_opacity данными.
     */
    public function run(): void
    {
        if (DB::table('tw_backdrop_opacity')->count() == 0) {
            DB::table('tw_backdrop_opacity')->insert([
                ['name' => 'backdrop-opacity-0', 'value' => 'opacity(0)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-5', 'value' => 'opacity(0.05)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-10', 'value' => 'opacity(0.1)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-15', 'value' => 'opacity(0.15)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-20', 'value' => 'opacity(0.2)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-25', 'value' => 'opacity(0.25)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-30', 'value' => 'opacity(0.3)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-35', 'value' => 'opacity(0.35)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-40', 'value' => 'opacity(0.4)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-45', 'value' => 'opacity(0.45)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-50', 'value' => 'opacity(0.5)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-55', 'value' => 'opacity(0.55)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-60', 'value' => 'opacity(0.6)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-65', 'value' => 'opacity(0.65)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-70', 'value' => 'opacity(0.7)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-75', 'value' => 'opacity(0.75)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-80', 'value' => 'opacity(0.8)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-85', 'value' => 'opacity(0.85)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-90', 'value' => 'opacity(0.9)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-95', 'value' => 'opacity(0.95)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-opacity-100', 'value' => 'opacity(1)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
