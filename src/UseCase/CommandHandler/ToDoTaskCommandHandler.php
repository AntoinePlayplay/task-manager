<?php

declare(strict_types=1);

namespace App\UseCase\CommandHandler;

use App\Domain\Model\Task;
use App\Domain\Repository\TaskRepository;
use App\UseCase\Command\CompleteTaskCommand;
use App\UseCase\Command\CreateTaskCommand;
use App\UseCase\Command\ToDoTaskCommand;
use App\UseCase\Command\UpdateTaskCommand;
use App\UseCase\Query\GetTaskQuery;

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
