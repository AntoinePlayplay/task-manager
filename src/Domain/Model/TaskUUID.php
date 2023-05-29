<?php

declare(strict_types=1);

namespace App\Domain\Model;

use Ramsey\Uuid\Uuid;

final class TaskUUID
{
    private string $uuid;

    public function __construct()
    {
        $this->uuid = Uuid::uuid7()->toString();
    }

    public static function fromString(string $uuid): TaskUUID
    {
        $taskUUID = new self();
        $taskUUID->uuid = $uuid;
        return $taskUUID;
    }

    public function toString(): string
    {
        return $this->uuid;
    }
}
