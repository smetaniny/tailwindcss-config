<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * В разделе content вы настраиваете пути ко всем вашим HTML-шаблонам, компонентам
 * JavaScript и любым другим исходным файлам, которые содержат имена классов Tailwind.
 */
return new class extends Migration {
    /**
     * Запуск миграции.
     */
    public function up(): void
    {
        // Создаем таблицу tw_content
        Schema::create('tw_content', function (Blueprint $table) {
            $table->id();
            $table->string('value')->comment('Путь к HTML-шаблонам, JS компонентам и другим файлам');
            $table->timestamps();
        });
    }

    /**
     * Откат миграции.
     *
     * Удаляет таблицу, если она существует.
     */
    public function down(): void
    {
        // Удаляем таблицу tw_content
        Schema::dropIfExists('tw_content');
    }
};
