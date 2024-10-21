<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для заполнения таблицы tw_backdrop_blur.
 */
class TwBackdropBlurSeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_backdrop_blur данными.
     */
    public function run(): void
    {
        if (DB::table('tw_backdrop_blur')->count() == 0) {
            DB::table('tw_backdrop_blur')->insert([
                ['name' => 'backdrop-blur-none', 'value' => '', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-blur-sm', 'value' => 'blur(4px)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-blur', 'value' => 'blur(8px)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-blur-md', 'value' => 'blur(12px)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-blur-lg', 'value' => 'blur(16px)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-blur-xl', 'value' => 'blur(24px)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-blur-2xl', 'value' => 'blur(40px)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-blur-3xl', 'value' => 'blur(64px)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
