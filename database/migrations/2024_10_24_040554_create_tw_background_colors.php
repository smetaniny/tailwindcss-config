<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания таблицы tw_background_colors.
 */
return new class extends Migration {
    /**
     * Создание таблицы tw_background_colors.
     */
    public function up(): void
    {
        Schema::create('tw_background_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained('tw_themes')->onDelete('cascade');

            $table->string('name')->comment('Имя класса для цвета фона, например bg-blue-500');
            $table->string('value')->comment('Значение цвета фона, например rgb(59 130 246)');

            $table->timestamps();
        });
    }

    /**
     * Удаление таблицы tw_background_colors.
     */
    public function down(): void
    {
        Schema::dropIfExists('tw_background_colors');
    }
};
