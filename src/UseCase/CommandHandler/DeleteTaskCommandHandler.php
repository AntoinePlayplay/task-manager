<?php

declare(strict_types=1);

namespace App\UseCase\CommandHandler;

use App\Domain\Repository\TaskRepository;
use App\UseCase\Command\DeleteTaskCommand;

final readonly class DeleteTaskCommandHandler implements CommandHandlerInterface
{
    public function __construct(private TaskRepository $taskRepository)
    {
    }

    public function __invoke(DeleteTaskCommand $deleteTaskCommand): void
    {
        $this->taskRepository->delete($deleteTaskCommand->uuid);
    }
}
