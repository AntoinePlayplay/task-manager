<?php

declare(strict_types=1);

namespace App\Interface\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class UpdateTaskDto
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(min: 1, max: 255)]
        public string $name,
        public string $description,
    ) {
    }
}
