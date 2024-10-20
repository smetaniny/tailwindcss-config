<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для создания таблицы themes.
 */
return new class extends Migration
{
    /**
     * Выполнение миграции: создание таблицы themes.
     */
    public function up(): void
    {
        Schema::create('tw_themes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название темы');
            $table->timestamps();
        });
    }

    /**
     * Откат миграции: удаление таблицы themes.
     */
    public function down(): void
    {
        Schema::dropIfExists('tw_themes');
    }
};
