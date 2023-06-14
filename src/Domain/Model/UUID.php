<?php

declare(strict_types=1);

namespace App\Domain\Model;

final class UUID
{
    public function __construct(private string $uuid)
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
