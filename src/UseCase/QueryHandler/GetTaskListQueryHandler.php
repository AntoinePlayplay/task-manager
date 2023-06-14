<?php

declare(strict_types=1);

namespace App\UseCase\QueryHandler;

use App\Domain\Repository\TaskRepository;

final readonly class GetTaskListQueryHandler
{
    public function __construct(private TaskRepository $taskRepository)
    {
    }

    public function handle(): array
    {
        return $this->taskRepository->list();
    }
}
