<?php

declare(strict_types=1);

namespace App\UseCase\Command;

use App\Domain\Model\UUID;

final class CreateTaskCommand
{
    public function __construct(
        public readonly UUID $uuid,
        public readonly string $name,
        public readonly string $description,
    ) {
    }
}
