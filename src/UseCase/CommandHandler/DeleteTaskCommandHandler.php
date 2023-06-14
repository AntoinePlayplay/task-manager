<?php

declare(strict_types=1);

namespace App\UseCase\CommandHandler;

use App\Domain\Repository\TaskRepository;
use App\UseCase\Command\DeleteTaskCommand;

final class DeleteTaskCommandHandler
{
    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }

    public function handle(DeleteTaskCommand $deleteTaskCommand): void
    {
        $this->taskRepository->delete($deleteTaskCommand->uuid);
    }
}
