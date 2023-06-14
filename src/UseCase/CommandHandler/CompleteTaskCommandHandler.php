<?php

declare(strict_types=1);

namespace App\UseCase\CommandHandler;

use App\Domain\Repository\TaskRepository;
use App\UseCase\Command\CompleteTaskCommand;

final class CompleteTaskCommandHandler
{
    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }

    public function handle(CompleteTaskCommand $completeTaskCommand): void
    {
        $task = $this->taskRepository->get($completeTaskCommand->uuid);
        $task = $task->complete();
        $this->taskRepository->update($task);
    }
}
