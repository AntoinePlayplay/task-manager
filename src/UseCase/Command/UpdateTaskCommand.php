<?php

declare(strict_types=1);

namespace App\UseCase\Command;

use App\Domain\Model\TaskUUID;

final class UpdateTaskCommand
{
    public function __construct(
        public readonly TaskUUID $uuid,
        public readonly string $name,
        public readonly string $description,
    ) {
    }
}
