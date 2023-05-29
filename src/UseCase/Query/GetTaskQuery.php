<?php

declare(strict_types=1);

namespace App\UseCase\Query;

use App\Domain\Model\TaskUUID;

final class GetTaskQuery
{
    public function __construct(public readonly TaskUUID $uuid)
    {
    }
}
