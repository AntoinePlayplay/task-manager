<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Task;
use App\Domain\Model\TaskUUID;

interface TaskRepository
{
    /**
     * @return Task[]
     */
    public function list(): array;
    public function get(TaskUUID $uuid): Task;
    public function create(Task $task): void;
    public function update(Task $task): void;
    public function delete(TaskUUID $uuid): void;
}
