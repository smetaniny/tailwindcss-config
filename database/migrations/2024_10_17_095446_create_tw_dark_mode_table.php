<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания таблицы tw_dark_mode.
 */
return new class extends Migration
{
    /**
     * Создание таблицы tw_dark_mode.
     */
    public function up(): void
    {
        Schema::create('tw_dark_mode', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')
                ->constrained('tw_themes')
                ->onDelete('cascade');
            $table->enum('mode', ['media', 'selector'])
                ->default('media')
                ->comment('Режим тёмной темы: media - зависит от настроек устройства, selector - с помощью CSS класса');
            $table->timestamps();
        });
    }

    /**
     * Удаление таблицы tw_dark_mode.
     */
    public function down(): void
    {
        Schema::dropIfExists('tw_dark_mode');
    }
};
