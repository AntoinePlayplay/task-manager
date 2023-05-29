<?php

declare(strict_types=1);

namespace App\UseCase\CommandHandler;

use App\Domain\Model\Task;
use App\Domain\Repository\TaskRepository;
use App\UseCase\Command\CompleteTaskCommand;
use App\UseCase\Command\CreateTaskCommand;
use App\UseCase\Command\UpdateTaskCommand;
use App\UseCase\Query\GetTaskQuery;

final class CompleteTaskCommandHandler
{
    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }

    public function handle(CompleteTaskCommand $completeTaskCommand): void
    {
        $task = $this->taskRepository->get($completeTaskCommand->uuid);
        $task = $task->completed();
        $this->taskRepository->update($task);
    }
}
