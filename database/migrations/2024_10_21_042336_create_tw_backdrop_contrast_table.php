<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания таблицы tw_backdrop_contrast.
 */
return new class extends Migration {
    /**
     * Создание таблицы tw_backdrop_contrast.
     */
    public function up(): void
    {
        Schema::create('tw_backdrop_contrast', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained('tw_themes')->onDelete('cascade'); // Связь с таблицей tw_themes
            $table->string('name')->comment('Имя класса контрастности фона, например backdrop-contrast-0');
            $table->string('value')->comment('Значение фильтра контрастности фона, например contrast(0)');
            $table->timestamps();
        });
    }

    /**
     * Удаление таблицы tw_backdrop_contrast.
     */
    public function down(): void
    {
        Schema::dropIfExists('tw_backdrop_contrast');
    }
};
