<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\seeders;

use Illuminate\Support\Facades\DB;
use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * Сидер для aria атрибутов TailwindCSS
 *
 * @author Smetanin Sergey
 */
class TwAriaSeed implements SeederInterface
{
    /**
     * Заполнение таблицы tw_aria данными
     */
    public function run(): void
    {
        if (DB::table('tw_aria')->count() == 0) {
            DB::table('tw_aria')->insert([
                ['name' => 'busy', 'value' => 'busy="true"', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'checked', 'value' => 'checked="true"', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'disabled', 'value' => 'disabled="true"', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'expanded', 'value' => 'expanded="true"', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'hidden', 'value' => 'hidden="true"', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'pressed', 'value' => 'pressed="true"', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'readonly', 'value' => 'readonly="true"', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'required', 'value' => 'required="true"', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'selected', 'value' => 'selected="true"', 'theme_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
