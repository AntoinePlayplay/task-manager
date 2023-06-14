<?php

declare(strict_types=1);

namespace App\UseCase\Command;

use App\Domain\Model\UUID;

final readonly class UpdateTaskCommand
{
    public function __construct(
        public UUID $uuid,
        public string $name,
        public string $description,
    ) {
    }
}
