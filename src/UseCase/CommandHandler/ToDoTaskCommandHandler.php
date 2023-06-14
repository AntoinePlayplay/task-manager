<?php

declare(strict_types=1);

namespace App\UseCase\CommandHandler;

use App\Domain\Repository\TaskRepository;
use App\UseCase\Command\ToDoTaskCommand;

final class ToDoTaskCommandHandler
{
    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }

    public function handle(ToDoTaskCommand $toDoTaskCommand): void
    {
        $task = $this->taskRepository->get($toDoTaskCommand->uuid);
        $task = $task->toDo();
        $this->taskRepository->update($task);
    }
}
