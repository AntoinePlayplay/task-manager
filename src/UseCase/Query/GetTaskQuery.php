<?php

declare(strict_types=1);

namespace App\UseCase\Query;

use App\Domain\Model\UUID;

final readonly class GetTaskQuery
{
    public function __construct(public UUID $uuid)
    {
    }
}
