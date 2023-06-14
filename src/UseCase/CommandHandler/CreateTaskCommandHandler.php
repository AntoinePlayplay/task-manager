<?php

declare(strict_types=1);

namespace App\UseCase\CommandHandler;

use App\Domain\Model\Task;
use App\Domain\Repository\TaskRepository;
use App\UseCase\Command\CreateTaskCommand;

final class CreateTaskCommandHandler
{
    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }

    public function handle(CreateTaskCommand $createTaskCommand): void
    {
        $task = new Task();
        $task = $task->create($createTaskCommand->uuid, $createTaskCommand->name, $createTaskCommand->description);
        $this->taskRepository->create($task);
    }
}
