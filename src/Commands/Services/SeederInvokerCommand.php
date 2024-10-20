<?php

namespace Smetaniny\TailwindcssConfig\Commands\Services;

use Smetaniny\TailwindcssConfig\Commands\Contracts\SeederInterface;

/**
 * SeederInvoker используется для управления и последовательного запуска сидеров (seeder'ов).
 *
 * @author Smetanin Sergey
 */
class SeederInvokerCommand
{
    /**
     * Массив команд-сидеров, которые будут запущены.
     *
     * @var SeederInterface[]
     */
    protected array $commands = [];

    /**
     * Добавляет команду-сидер в список для последующего выполнения.
     *
     * @param SeederInterface $command Сидер, который нужно добавить
     */
    public function addCommand(SeederInterface $command): void
    {
        $this->commands[] = $command;
    }

    /**
     * Последовательно выполняет все добавленные команды-сидеры.
     */
    public function runAll(): void
    {
        foreach ($this->commands as $command) {
            $command->run();
        }
    }
}
