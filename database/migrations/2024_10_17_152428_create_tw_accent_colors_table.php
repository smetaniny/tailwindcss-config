<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция создаст таблицу `accent_colors`, которая будет хранить
 * акцентные цвета (например, для чекбоксов, радиокнопок и т.д.) с их значениями в HEX формате.
 */
return new class extends Migration {
    /**
     * Выполнение миграции.
     */
    public function up(): void
    {
        Schema::create('tw_accent_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('Название акцентного цвета');
            $table->string('hex_value')->comment('Значение акцентного цвета в HEX формате или ключевое слово');
            $table->foreignId('theme_id')->constrained('tw_themes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Откат миграции.
     */
    public function down(): void
    {
        Schema::dropIfExists('tw_accent_colors');
    }
};
