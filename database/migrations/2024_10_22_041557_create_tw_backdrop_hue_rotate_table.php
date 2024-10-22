<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания таблицы tw_backdrop_hue_rotate.
 */
return new class extends Migration {
    /**
     * Создание таблицы tw_backdrop_hue_rotate.
     */
    public function up(): void
    {
        Schema::create('tw_backdrop_hue_rotate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained('tw_themes')->onDelete('cascade');
            $table->string('name')->comment('Имя класса поворота оттенков для фона, например backdrop-hue-rotate-0');
            $table->string('value')->comment('Значение фильтра поворота оттенков для фона, например hue-rotate(0deg)');
            $table->timestamps();
        });
    }

    /**
     * Удаление таблицы tw_backdrop_hue_rotate.
     */
    public function down(): void
    {
        Schema::dropIfExists('tw_backdrop_hue_rotate');
    }
};
