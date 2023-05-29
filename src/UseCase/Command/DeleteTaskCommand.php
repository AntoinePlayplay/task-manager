<?php

declare(strict_types=1);

namespace App\UseCase\Command;

use App\Domain\Model\TaskUUID;

final class DeleteTaskCommand
{
    public function __construct(
        public readonly TaskUUID $uuid,
    ) {
    }
}
