<?php

declare(strict_types=1);

namespace App\UseCase\CommandHandler;

use App\Domain\Repository\TaskRepository;
use App\UseCase\Command\ToDoTaskCommand;

final readonly class ToDoTaskCommandHandler implements CommandHandlerInterface
{
    public function __construct(private TaskRepository $taskRepository)
    {
    }

    public function __invoke(ToDoTaskCommand $toDoTaskCommand): void
    {
        $task = $this->taskRepository->get($toDoTaskCommand->uuid);
        $task = $task->toDo();
        $this->taskRepository->update($task);
    }
}
