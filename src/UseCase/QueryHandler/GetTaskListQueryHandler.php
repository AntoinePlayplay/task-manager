<?php

declare(strict_types=1);

namespace App\UseCase\QueryHandler;

use App\Domain\Repository\TaskRepository;
use App\UseCase\Query\GetTaskListQuery;

final readonly class GetTaskListQueryHandler implements QueryHandlerInterface
{
    public function __construct(private TaskRepository $taskRepository)
    {
    }

    public function __invoke(GetTaskListQuery $getTaskListQuery): array
    {
        return $this->taskRepository->list();
    }
}
