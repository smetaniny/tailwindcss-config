<?php

declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для анимаций TailwindCSS
 *
 * @author Smetanin Sergey
 */
class TwAnimationsSeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_animations данными
     */
    public function run(): void
    {
        // Проверяем, что таблица tw_animations пуста
        if (DB::table('tw_animations')->count() === 0) {
            DB::table('tw_animations')->insert([
                [
                    'theme_id' => 1,
                    'name' => 'none',
                    'duration' => 'none',
                    'timing_function' => 'none',
                    'infinite' => false,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'theme_id' => 1,
                    'name' => 'spin',
                    'duration' => '1s',
                    'timing_function' => 'linear',
                    'infinite' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'theme_id' => 1,
                    'name' => 'ping',
                    'duration' => '1s',
                    'timing_function' => 'cubic-bezier(0, 0, 0.2, 1)',
                    'infinite' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'theme_id' => 1,
                    'name' => 'pulse',
                    'duration' => '2s',
                    'timing_function' => 'cubic-bezier(0.4, 0, 0.6, 1)',
                    'infinite' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'theme_id' => 1,
                    'name' => 'bounce',
                    'duration' => '1s',
                    'timing_function' => 'cubic-bezier(0.8, 0, 0.2, 1)',
                    'infinite' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }
    }
}
