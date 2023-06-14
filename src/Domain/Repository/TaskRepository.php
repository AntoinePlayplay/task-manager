<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Task;
use App\Domain\Model\UUID;

interface TaskRepository
{
    public function create(Task $task): void;

    public function delete(UUID $uuid): void;

    public function get(UUID $uuid): Task;

    /**
     * @return Task[]
     */
    public function list(): array;

    public function update(Task $task): void;
}
