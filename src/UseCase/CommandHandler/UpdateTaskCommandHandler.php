<?php

declare(strict_types=1);

namespace App\UseCase\CommandHandler;

use App\Domain\Repository\TaskRepository;
use App\UseCase\Command\UpdateTaskCommand;

final readonly class UpdateTaskCommandHandler implements CommandHandlerInterface
{
    public function __construct(private TaskRepository $taskRepository)
    {
    }

    public function __invoke(UpdateTaskCommand $updateTaskCommand): void
    {
        $task = $this->taskRepository->get($updateTaskCommand->uuid);
        $task = $task->update($updateTaskCommand->name, $updateTaskCommand->description);
        $this->taskRepository->update($task);
    }
}
