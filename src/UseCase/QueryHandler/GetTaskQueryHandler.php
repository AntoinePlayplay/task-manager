<?php

declare(strict_types=1);

namespace App\UseCase\QueryHandler;

use App\Domain\Model\Task;
use App\Domain\Repository\TaskRepository;
use App\UseCase\Query\GetTaskQuery;

final class GetTaskQueryHandler
{
    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }

    public function handle(GetTaskQuery $getTaskQuery): Task
    {
        return $this->taskRepository->get($getTaskQuery->uuid);
    }
}
