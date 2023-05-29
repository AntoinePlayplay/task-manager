<?php

declare(strict_types=1);

namespace App\UseCase\QueryHandler;

use App\Domain\Repository\TaskRepository;

final class GetTaskListQueryHandler
{
    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }

    public function handle(): array
    {
        return $this->taskRepository->list();
    }
}
