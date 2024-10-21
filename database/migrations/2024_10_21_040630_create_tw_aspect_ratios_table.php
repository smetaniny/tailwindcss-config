<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания таблицы tw_aspect_ratios.
 */
return new class extends Migration {
    /**
     * Создание таблицы tw_aspect_ratios.
     */
    public function up(): void
    {
        Schema::create('tw_aspect_ratios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained('tw_themes')->onDelete('cascade');
            $table->string('name')->comment('Имя соотношения сторон, например auto, square, video');
            $table->string('ratio')->comment('Значение соотношения сторон, например 1 / 1, 16 / 9');
            $table->timestamps();
        });
    }

    /**
     * Удаление таблицы tw_aspect_ratios.
     */
    public function down(): void
    {
        Schema::dropIfExists('tw_aspect_ratios');
    }
};
