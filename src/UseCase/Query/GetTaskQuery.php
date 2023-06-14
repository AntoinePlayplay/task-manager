<?php

declare(strict_types=1);

namespace App\UseCase\Query;

use App\Domain\Model\UUID;

final class GetTaskQuery
{
    public function __construct(public readonly UUID $uuid)
    {
    }
}
