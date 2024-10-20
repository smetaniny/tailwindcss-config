<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания таблицы tw_aria.
 */
return new class extends Migration {
    /**
     * Создание таблицы tw_aria.
     */
    public function up(): void
    {
        Schema::create('tw_aria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained('tw_themes')->onDelete('cascade');

            $table->string('name')->comment('Название aria атрибута');
            $table->string('value')->comment('Значение aria атрибута');

            $table->timestamps();
        });
    }

    /**
     * Удаление таблицы tw_aria.
     */
    public function down(): void
    {
        Schema::dropIfExists('tw_aria');
    }
};
