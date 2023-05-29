<?php

declare(strict_types=1);

namespace App\UseCase\Command;

use App\Domain\Model\TaskUUID;

final class CreateTaskCommand
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
    ) {
    }
}
