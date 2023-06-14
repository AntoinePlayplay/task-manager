<?php

declare(strict_types=1);

namespace App\UseCase\CommandHandler;

use App\Domain\Repository\TaskRepository;
use App\UseCase\Command\CompleteTaskCommand;

final readonly class CompleteTaskCommandHandler implements CommandHandlerInterface
{
    public function __construct(private TaskRepository $taskRepository)
    {
    }

    public function __invoke(CompleteTaskCommand $completeTaskCommand): void
    {
        $task = $this->taskRepository->get($completeTaskCommand->uuid);
        $task = $task->complete();
        $this->taskRepository->update($task);
    }
}
