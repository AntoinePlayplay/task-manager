<?php

declare(strict_types=1);

namespace App\UseCase\Command;

use App\Domain\Model\UUID;

final class ToDoTaskCommand
{
    public function __construct(
        public readonly UUID $uuid,
    ) {
    }
}
