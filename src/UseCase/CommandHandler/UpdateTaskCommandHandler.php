<?php

declare(strict_types=1);

namespace App\UseCase\CommandHandler;

use App\Domain\Model\Task;
use App\Domain\Repository\TaskRepository;
use App\UseCase\Command\CreateTaskCommand;
use App\UseCase\Command\UpdateTaskCommand;
use App\UseCase\Query\GetTaskQuery;

final class UpdateTaskCommandHandler
{
    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }

    public function handle(UpdateTaskCommand $updateTaskCommand): void
    {
        $task = $this->taskRepository->get($updateTaskCommand->uuid);
        $task = $task->update($updateTaskCommand->name, $updateTaskCommand->description);
        $this->taskRepository->update($task);
    }
}
