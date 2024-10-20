<?php
declare(strict_types=1);

namespace Smetaniny\TailwindcssConfig\Commands\Contracts;

/**
 * Интерфейс для сидеров
 */
interface SeederInterface
{
    /**
     * Выполняет сидинг данных
     */
    public function run(): void;
}
