<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания таблицы tw_backdrop_blur.
 */
return new class extends Migration {
    /**
     * Создание таблицы tw_backdrop_blur.
     */
    public function up(): void
    {
        Schema::create('tw_backdrop_blur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained('tw_themes')->onDelete('cascade');
            $table->string('name')->comment('Название класса размытия фона, например backdrop-blur-sm');
            $table->string('value')->comment('CSS значение размытия фона, например blur(4px)');
            $table->timestamps();
        });
    }

    /**
     * Удаление таблицы tw_backdrop_blur.
     */
    public function down(): void
    {
        Schema::dropIfExists('tw_backdrop_blur');
    }
};
