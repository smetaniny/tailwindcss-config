<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания таблицы tw_backdrop_brightness.
 */
return new class extends Migration {
    /**
     * Создание таблицы tw_backdrop_brightness.
     */
    public function up(): void
    {
        Schema::create('tw_backdrop_brightness', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained('tw_themes')->onDelete('cascade');
            $table->string('name')->comment('Имя класса яркости фона, например backdrop-brightness-0');
            $table->string('value')->comment('Значение фильтра яркости фона, например brightness(0)');
            $table->timestamps();
        });
    }

    /**
     * Удаление таблицы tw_backdrop_brightness.
     */
    public function down(): void
    {
        Schema::dropIfExists('tw_backdrop_brightness');
    }
};
