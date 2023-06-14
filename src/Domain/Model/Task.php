<?php

declare(strict_types=1);

namespace App\Domain\Model;

class Task
{
    private int $id;
    private UUID $uuid;
    private string $name;
    private string $description;
    private bool $completed;
    private \DateTime $createdAt;
    private ?\DateTime $updatedAt;
    private ?\DateTime $completedAt;


    public function getId(): int
    {
        return $this->id;
    }

    public function getUUID(): UUID
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function getCompletedAt(): ?\DateTime
    {
        return $this->completedAt;
    }

    public function create(UUID $uuid, string $name, string $description): self
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->completed = false;
        $this->createdAt = new \DateTime();

        return $this;
    }

    public function update(string $name, string $description): self
    {
        $this->name = $name;
        $this->description = $description;
        $this->updatedAt = new \DateTime();

        return $this;
    }

    public function complete(): self
    {
        $this->completed = true;
        $this->updatedAt = new \DateTime();
        $this->completedAt = new \DateTime();

        return $this;
    }

    public function toDo(): self
    {
        $this->completed = false;
        $this->updatedAt = new \DateTime();
        $this->completedAt = null;

        return $this;
    }
}
