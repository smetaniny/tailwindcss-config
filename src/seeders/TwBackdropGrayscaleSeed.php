<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для заполнения таблицы tw_backdrop_grayscale.
 */
class TwBackdropGrayscaleSeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_backdrop_grayscale данными.
     */
    public function run(): void
    {
        if (DB::table('tw_backdrop_grayscale')->count() == 0) {
            DB::table('tw_backdrop_grayscale')->insert([
                ['name' => 'backdrop-grayscale-0', 'value' => 'grayscale(0)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'backdrop-grayscale', 'value' => 'grayscale(100%)', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
