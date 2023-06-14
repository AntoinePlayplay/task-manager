<?php

namespace App\Interface\Api;

use App\Domain\Model\UUID;
use App\Interface\Dto\UpdateTaskDto;
use App\UseCase\Command\UpdateTaskCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class UpdateTaskController extends AbstractController
{
    public function __construct(private readonly MessageBusInterface $commandBus)
    {
    }

    #[Route("/api/{uuid}", name: "task_update", methods: ["PUT"])]
    public function __invoke(string $uuid, #[MapRequestPayload] UpdateTaskDto $updateTaskDto): JsonResponse
    {
        $updateTaskCommand = new UpdateTaskCommand(
            uuid: new UUID($uuid),
            name: $updateTaskDto->name,
            description: $updateTaskDto->description,
        );
        $this->commandBus->dispatch($updateTaskCommand);

        return $this->json($uuid, Response::HTTP_OK);
    }
}
