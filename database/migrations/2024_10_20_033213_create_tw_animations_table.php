<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tw_animations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название анимации');
            $table->string('duration')->comment('Длительность анимации');
            $table->string('timing_function')->comment('Функция временной кривой анимации');
            $table->boolean('infinite')->default(false)->comment('Флаг для бесконечности анимации');
            $table->foreignId('theme_id')->constrained('tw_themes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tw_animations');
    }
};
