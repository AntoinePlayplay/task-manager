<?php

declare(strict_types=1);

namespace App\UseCase\QueryHandler;

use App\Domain\Model\Task;
use App\Domain\Repository\TaskRepository;
use App\UseCase\Query\GetTaskQuery;

final readonly class GetTaskQueryHandler implements QueryHandlerInterface
{
    public function __construct(private TaskRepository $taskRepository)
    {
    }

    public function __invoke(GetTaskQuery $getTaskQuery): Task
    {
        return $this->taskRepository->get($getTaskQuery->uuid);
    }
}
